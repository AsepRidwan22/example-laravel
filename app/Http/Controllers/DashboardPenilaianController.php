<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class DashboardPenilaianController extends Controller
{

    public function index()
    {
        // dd(auth()->user()->id);
        return view('dashboard.penilaians.indexBimbingan', [
            'mahasiswas' => Mahasiswa::where('dosen_id', Dosen::where('user_id', auth()->user()->id)->value('id'))->get(),
        ]);
    }

    public function penguji()
    {
        // dd(auth()->user()->id);
        return view('dashboard.penilaians.indexPenguji', [
            'mahasiswas' => Mahasiswa::where('penguji_id', Dosen::where('user_id', auth()->user()->id)->value('id'))->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('dashboard.penilaians.create', [
        //     // 'data_seminar' => Seminar::where('user_id', auth()->user()->id)->value('id'),
        // ]);
    }

    public function viewPembimbing(Mahasiswa $mahasiswa)
    {
        // dd($mahasiswa->user_id);
        return view('dashboard.penilaians.pembimbing', [
            'mahasiswa_id' => $mahasiswa->user_id,
        ]);
    }

    public function nilaiPembimbing(Mahasiswa $mahasiswa, Request $request)
    {
        // dd($mahasiswa->user_id);
        $average = $request->all();
        $nilaiPembimbing = array_sum($average) / count($average) - 1;

        Penilaian::where('user_id', $mahasiswa->user_id)->update(['nilai_pembimbing' => $nilaiPembimbing]);
        return redirect('/dashboard/penilaians/bimbingan')->with('success', 'Nilai sudah dibuat');
    }

    public function viewPenguji(Mahasiswa $mahasiswa)
    {
        // dd($mahasiswa->user_id);
        return view('dashboard.penilaians.penguji', [
            'mahasiswa_id' => $mahasiswa->user_id,
        ]);
    }

    public function nilaiPenguji(Mahasiswa $mahasiswa, Request $request)
    {
        // dd($request->all());
        $average = $request->all();
        $requestLength = count($average) - 2;
        $nilaiPenguji = array_sum($average) / $requestLength;
        print_r(array_sum($average) / $requestLength);

        Penilaian::where('user_id', $mahasiswa->user_id)->update(['nilai_penguji' => $nilaiPenguji]);

        return redirect('/dashboard/penilaians/penguji')->with('success', 'Nilai sudah dibuat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $average = $request->all();
        $pembimbing = array_sum($average) / count($average) - 1;

        // print_r($pembimbing);
        $validateData['nilai_pembimbing'] = $pembimbing;
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
