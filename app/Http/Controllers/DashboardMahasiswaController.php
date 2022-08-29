<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Logbook;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Progres;
use App\Models\Proposal;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Output\NullOutput;

class DashboardMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Logbook::where('isHadir', 1)->where('mahasiswa_id', 2)->count());
        if (auth()->user()->roles === 'koordinator') {
            return view('dashboard.mahasiswas.index', [
                'mahasiswas' => Mahasiswa::all(),
                'logbooks' => Logbook::where('isHadir', 1)->get(),
                'progres' => Progres::whereNotNull('laporan')->get()
            ]);
        } else if (auth()->user()->roles === 'dosen') {
            $id = Dosen::where('user_id', auth()->user()->id)->pluck('id');
            return view('dashboard.mahasiswas.index', [
                'mahasiswas' => Mahasiswa::where('dosen_id', $id)->get()
            ]);
        }
    }

    public function dashboard()
    {
        // dd(Mahasiswa::where('id', 1)->get()->count());
        return view('dashboard.index', [
            'mahasiswas' => Mahasiswa::count(),
            // 'pengajuanProposals' => Proposal::where('isAccProposal', 0)->orWhere('isAccProposal',  null)->count(),
            'pengajuanProposals' => Proposal::whereNotNull('judul')->count(),
            'accProposals' => Proposal::where('isAccProposal', 1)->count(),
            'bimbingans' => Logbook::whereNotNull('body')->get()->unique('mahasiswa_id')->count(),
            // 'finishBimbingan' => Logbook::
        ]);
    }

    public function bimbingan()
    {
        // dd(Logbook::where('isHadir', 1)->where('mahasiswa_id', 2)->count());
        if (auth()->user()->roles === 'koordinator') {
            return view('dashboard.mahasiswas.bimbingan', [
                'mahasiswas' => Mahasiswa::whereNotNull('dosen_id')->get(),
                'logbooks' => Logbook::where('isHadir', 1)->get(),
                'progres' => Progres::whereNotNull('laporan')->get()
            ]);
        } else if (auth()->user()->roles === 'dosen') {
            $id = Dosen::where('user_id', auth()->user()->id)->pluck('id');
            return view('dashboard.mahasiswas.index', [
                'mahasiswas' => Mahasiswa::where('dosen_id', $id)->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.mahasiswas.create', [
            'dosens' => Dosen::all()
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
        // dd($request->validate());

        $rules = [
            'nama' => 'required|max:255',
            'npm' => 'required|unique:mahasiswas',
            'kelas' => 'required',
            'noHp' => 'required',
            'email' => 'required|email|unique:mahasiswas'
        ];


        $validateData = $request->validate($rules);

        $validated = Validator::make($validateData, $rules);

        if (!$validated->fails()) {
            User::create([
                'username' => $request->npm,
                'roles' => 'mahasiswa',
                'password' => bcrypt('12345')
            ]);
        }

        $validateData['user_id'] = User::where('username', $request->npm)->value('id');

        Mahasiswa::create($validateData);

        $user = User::where('username', $request->npm)->value('id');
        $mahasiswa = Mahasiswa::where('npm', $request->npm)->value('id');

        Logbook::factory(7)->create(['user_id' => $user, 'mahasiswa_id' => $mahasiswa]);
        Progres::factory(4)->create(['user_id' => $user, 'mahasiswa_id' => $mahasiswa]);
        return redirect('/dashboard/mahasiswas')->with('success', 'Mahasiswa beserta akunnya sudah ditambahkan!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
