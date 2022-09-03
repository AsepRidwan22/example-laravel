<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Instansi;
use App\Models\Proposal;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class DashboardProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.proposal.index', [
            'proposals' => Proposal::all(),
            'dosens' => Dosen::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Proposal::where('user_id', auth()->user()->id)->value('isAccProposal'));
        return view('dashboard.proposal.create', [
            'categories' => Proposal::all(),

            'proposalUser' => Proposal::where('user_id', auth()->user()->id)->get(),
            'proposalStatus' => Proposal::where('user_id', auth()->user()->id)->value('isAccProposal')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Instansi::where('noHp', $request->noHp)->get()->value('id'));
        $validateInstansi = $request->validate([
            'namaInstansi' => 'required|max:255',
            'namaPembimbing' => 'required|max:255',
            'noHp' => 'required'
        ]);

        if (Instansi::where('noHp', $request->noHp)->value('id') === null) {
            Instansi::create($validateInstansi);
        }

        $validateData = $request->validate([
            'judul' => 'required|max:255',
            'proposal' => 'required|mimes:pdf|max:2048'
        ]);

        if ($request->file('proposal')) {
            $validateData['proposal'] = $request->file('proposal')->store('proposal');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['mahasiswa_id']  = Mahasiswa::where('user_id', auth()->user()->id)->value('id');
        $validateData['instansi_id'] = Instansi::where('noHp', $request->noHp)->value('id');

        Proposal::create($validateData);
        return redirect('dashboard/proposals/create')->with('success', 'Proposal Berhasil Direvisi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {

        $validateData = $request->validate([
            'pesan' => '',
            'isAccProposal' => 'required'
        ]);
        Proposal::where('id', $proposal->id)->update($validateData);
        return redirect('dashboard/proposals')->with('success', 'Proposal Berhasil Direvisi!');
    }

    public function accept(Request $request, Proposal $proposal)
    {
        // dd(User::whereNull('username', Instansi::where('id', $proposal->instansi_id)->value('noHp')) === null);
        $validateData = $request->validate([
            'dosen_id' => 'required'
        ]);
        Mahasiswa::where('id', $proposal->mahasiswa_id)->update($validateData);
        Proposal::where('id', $proposal->id)->update(['isAccProposal' => 1]);

        if (User::whereOfNull('username', Instansi::where('id', $proposal->instansi_id)->value('noHp')) === null) {
            User::create([
                'username' => Instansi::where('id', $proposal->instansi_id)->value('noHp'),
                'roles' => 'lapangan',
                'password' => bcrypt('12345')
            ]);
        }

        return redirect('dashboard/proposals')->with('success', 'Proposal Berhasil Diaccept!');
    }

    public function revisi(Request $request, $id)
    {
        // dd($id);
        $validateInstansi = $request->validate([
            'namaInstansi' => 'required|max:255',
            'namaPembimbing' => 'required|max:255',
            'noHp' => 'required'
        ]);

        if (Instansi::where('noHp', $request->noHp)->value('id') === null) {
            Instansi::create($validateInstansi);
        }

        $validateData = $request->validate([
            'judul' => 'required|max:255',
            'proposal' => 'required|mimes:pdf|max:2048'
        ]);

        if ($request->file('proposal')) {
            $validateData['proposal'] = $request->file('proposal')->store('proposal');
        }

        $validateData['isAccProposal'] = null;

        Proposal::where('id', $id)->update($validateData);
        return redirect('/dashboard/proposals/create/')->with('success', 'Berhasil Mengirim Revisi Pengajuan Proposal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
