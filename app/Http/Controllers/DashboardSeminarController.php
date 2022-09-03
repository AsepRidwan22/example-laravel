<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Penilaian;
use App\Models\Seminar;
use App\Models\Logbook;
use App\Models\Progres;
use Illuminate\Http\Request;

class DashboardSeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.seminars.index', [
            'seminars' => Seminar::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Progres::where('user_id', auth()->user()->id)->whereNotNull('laporan')->count());
        return view('dashboard.seminars.create', [
            'logbookCount' => Logbook::where('user_id', auth()->user()->id)->where('isHadir', 1)->count(),
            'progresCount' => Progres::where('user_id', auth()->user()->id)->whereNotNull('laporan')->count(),
            'data_seminar' => Seminar::where('user_id', auth()->user()->id)->value('id'),
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
        // dd(auth()->user()->id);
        $validateData = $request->validate([
            'laporan' => 'required|mimes:pdf|max:2048'
        ]);

        if ($request->file('laporan')) {
            $validateData['laporan'] = $request->file('laporan')->store('laporan');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['mahasiswa_id'] = Mahasiswa::where('user_id', auth()->user()->id)->value('id');

        Seminar::create($validateData);
        return redirect('dashboard/seminars/create')->with('success', 'Laporan sudah di Ajukan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seminar  $seminar
     * @return \Illuminate\Http\Response
     */
    public function show(Seminar $seminar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seminar  $seminar
     * @return \Illuminate\Http\Response
     */
    public function edit(Seminar $seminar)
    {
        //
    }

    public function addJadwal(Seminar $seminar)
    {
        // dd($seminar->id);
        return view('dashboard.seminars.edit', [
            'seminar' => $seminar,
            'dosens' => Dosen::all()
        ]);
    }

    public function prosesJadwal(Seminar $seminar, Request $request)
    {
        // $a = $request->mulai . " s/d " . $request->akhir;
        // dd($seminar->user_id);
        $validateData['dosen_id'] = $request->dosen_id;
        $validateData['tanggal'] = $request->tanggal;
        $validateData['waktu'] = $request->mulai . " s/d " . $request->akhir;
        $validateData['ruangan'] = $request->ruangan;

        Seminar::where('id', $seminar->id)->update($validateData);
        Mahasiswa::where('user_id', $seminar->user_id)->update(['penguji_id' => $request->dosen_id]);
        Penilaian::create(['user_id' => $seminar->user_id]);

        return redirect('/dashboard/seminars')->with('success', 'Jadwal sudah dibuat');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seminar  $seminar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seminar $seminar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seminar  $seminar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seminar $seminar)
    {
        //
    }
}
