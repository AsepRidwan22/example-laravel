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
        // dd(Seminar::where('user_id', auth()->user()->id)->whereNotNull('tanggal'));
        return view('dashboard.seminars.index', [
            'seminars' => Seminar::where('accSeminar', 1)->get(),
            'nullSeminars' => Seminar::first('id'),
            // 'jadwalSeminar' => Seminar::where('user_id', auth()->user()->id)->whereNotNull('tanggal')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(auth()->user()->id);
        // dd(Dosen::where('user_id', auth()->user()->id)->value('id'));
        // dd(Seminar::where('dosen_id', $id)->get());
        // dd(Seminar::where('user_id', auth()->user()->id)->whereNotNull('tanggal')->value('id'));

        if (auth()->user()->roles === 'mahasiswa') {
            return view('dashboard.seminars.create', [
                'logbookCount' => Logbook::where('user_id', auth()->user()->id)->where('isHadir', 1)->count(),
                'progresCount' => Progres::where('user_id', auth()->user()->id)->whereNotNull('laporan')->count(),
                'data_seminar' => Seminar::where('user_id', auth()->user()->id)->value('id'),
                'seminars' => Seminar::where('user_id', auth()->user()->id)->get(),
                'jadwalNotNull' => Seminar::where('user_id', auth()->user()->id)->whereNotNull('tanggal')->value('id')
            ]);
        } elseif (auth()->user()->roles === 'dosen') {
            $id = Dosen::where('user_id', auth()->user()->id)->value('id');
            return view('dashboard.dosens.accseminar', [
                'seminars' => Seminar::where('pembimbing_id', $id)->get()
            ]);
        }
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
            'laporan' => 'required|mimes:pdf|max:2048',
            'keteranganPerpus' => 'required|mimes:pdf|max:2048',
            'bebasTagihan' => 'required|mimes:pdf|max:2048'
        ]);

        if ($request->file('laporan')) {
            $validateData['laporan'] = $request->file('laporan')->store('laporan');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['pembimbing_id'] = Mahasiswa::where('user_id', auth()->user()->id)->value('dosen_id');
        $validateData['mahasiswa_id'] = Mahasiswa::where('user_id', auth()->user()->id)->value('id');
        $validateData['accSeminar'] = 0;

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
        $dosen_id = Mahasiswa::where('id', $seminar->mahasiswa_id)->value('dosen_id');
        return view('dashboard.seminars.edit', [
            'seminar' => $seminar,
            'dosens' => Dosen::where('id', '!=', $dosen_id)->get(),
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

    public function accseminar(Seminar $seminar)
    {
        // dd($seminar->id);
        return view('dashboard.seminars.edit', [
            'seminar' => $seminar,
            'dosens' => Dosen::all(),
        ]);
    }

    public function prosesAcc(Seminar $seminar, Request $request)
    {
        // $a = $request->mulai . " s/d " . $request->akhir;
        // dd($seminar->user_id);
        $validateData['accSeminar'] = $request->accSeminar;

        Seminar::where('id', $seminar->id)->update($validateData);

        return redirect('/dashboard/seminars/create')->with('success', 'Jadwal sudah dibuat');
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
