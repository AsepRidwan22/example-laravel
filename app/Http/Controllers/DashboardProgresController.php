<?php

namespace App\Http\Controllers;

use App\Models\Progres;
use App\Models\Proposal;
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
        return view('dashboard.progres.index', [
            'checkProposal' => Proposal::where('mahasiswa_id', auth()->user()->id)->value('isAccProposal'),
            'progress' => Progres::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function showProgresMhs($id)
    {
        return view('dashboard.progres.index', [
            'checkProposal' => 1,
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
        Progres::where('id', $request->id)->update($validateData);
        return redirect('/dashboard/progres')->with('success', 'New post has been added!');
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
