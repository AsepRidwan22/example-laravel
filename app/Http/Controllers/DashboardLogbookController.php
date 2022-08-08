<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardLogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.logbooks.index', [
            'logbooks' => logbook::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.logbooks.create', [
            // 'users' => User::where('roles', 'mahasiswa')->get()->last(),
            // 'dosens' => Dosen::all()
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
        dd($request);
        $validateData = $request->validate(
            [
                'date' => 'required',
                'body' => 'required',
                'mahasiswa_id' => 'required',
                'user_id' => 'required'
            ]
        );

        // Logbook::where
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Logbook $logbook)
    {
        return view('dashboard.logbooks.edit', [
            'logbook' => $logbook
        ]);
    }

    public function showLogbookMhs($npm)
    {
        // dd($id);
        return view('dashboard.logbooks.index', [
            "logbooks" => Logbook::where('mahasiswa_id', Mahasiswa::where('npm', $npm)->pluck('id'))->get()
        ]);
    }

    // public function show2(Logbook $logbook)
    // {
    //     return view('dashboard.logbooks.index', [
    //         "logbooks" => $logbook->all()
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Logbook $logbook)
    {
        return view('dashboard.logbooks.edit', [
            'logbook' => $logbook
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logbook $logbook)
    {
        // dd(Mahasiswa::where('id', $logbook->mahasiswa_id)->pluck('npm'));
        $validateData = ['isHadir' => 'required'];
        $validateData['isHadir'] = $request->isHadir;
        logbook::where('id', $logbook->id)->update($validateData);
        $npm = Mahasiswa::where('id', $logbook->mahasiswa_id)->value('npm');
        return redirect('/dashboard/logbooks/mhs/' . $npm)->with('success', 'post has been updated!');
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
