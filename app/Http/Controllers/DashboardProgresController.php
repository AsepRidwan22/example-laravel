<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Progres;
use App\Models\Proposal;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DashboardProgresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Proposal::where('user_id', auth()->user()->id)->value('isAccProposal'));
        if (auth()->user()->roles === 'mahasiswa') {
            return view('dashboard.progres.index', [
                'checkProposal' => Proposal::where('mahasiswa_id', auth()->user()->id)->value('isAccProposal'),
                'progress' => Progres::where('user_id', auth()->user()->id)->get()
            ]);
        } elseif (auth()->user()->roles === 'dosen') {
            $id = Dosen::where('user_id', auth()->user()->id)->pluck('id');
            return view('dashboard.dosens.progres', [
                'mahasiswas' => Mahasiswa::where('dosen_id', $id)->get()
            ]);
        }
    }

    public function showProgresMhs($id)
    {
        return view('dashboard.progres.index', [
            'checkProposal' => Proposal::where('mahasiswa_id', auth()->user()->id)->value('isAccProposal'),
            'progress' => Progres::where('user_id', $id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // dd($id);
        $decryptedId = Crypt::decryptString($id);
        return view('dashboard.progres.edit', [
            'idProgres' => Progres::where('id', $decryptedId)->value('id'),
        ]);

        // Progres::find($id)->update();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->id);
        $validateData = ['laporan' => 'required', 'user_id' => 'required'];
        $validateData['laporan'] = $request->laporan;
        $validateData['user_id'] = auth()->user()->id;
        $validateData['laporan'] = $request->file('laporan')->store('laporan');
        Progres::where('id', $request->id)->update($validateData);
        return redirect('/dashboard/progres')->with('success', 'Progres Laporan Berhasil Ditambahkan!');
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
