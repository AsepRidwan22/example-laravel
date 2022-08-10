<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

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
            'logbooks' => logbook::where('user_id', auth()->user()->id)->get(),
            'mahasiswa' => Mahasiswa::where('user_id', auth()->user()->id)->value('nama')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('dashboard.logbooks.create', [
        //     // 'users' => User::where('roles', 'mahasiswa')->get()->last(),
        //     // 'dosens' => Dosen::all()
        //     // 'logbook' => logbook::all()
        // ]);
    }

    public function bodyUpdate($id, Logbook $logbook)
    {
        // dd($id);
        return view('dashboard.logbooks.create', [
            // 'users' => User::where('roles', 'mahasiswa')->get()->last(),
            // 'dosens' => Dosen::all()
            'logbook_id' => $id,
            'logbook' => $logbook
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
        // dd(Mahasiswa::where('user_id', auth()->user()->id)->value('id'));
        // $validateData = $request->validate(
        //     [
        //         'date' => 'required',
        //         'body' => 'required',
        //         'mahasiswa_id' => 'required',
        //         'user_id' => 'required'
        //     ]
        // );

        // $validateData['date'] = Carbon::now()->isoFormat('dddd, D MMMM Y');
        // $validateData['mahasiswa_id'] = Mahasiswa::where('user_id', auth()->user()->id)->value('id');
        // $validateData['user_id'] = auth()->user()->id;
        // Logbook::where('id', 13)->update($validateData);
        // Logbook::where
    }

    public function createUpdate(Request $request)
    {
        // dd(Crypt::encryptString($request->id));
        $validateData =
            [
                'body' => 'required',
                'mahasiswa_id' => 'required',
                'user_id' => 'required'
            ];
        $validateData['body'] = $request->body;
        $validateData['mahasiswa_id'] = Mahasiswa::where('user_id', auth()->user()->id)->value('id');
        $validateData['user_id'] = auth()->user()->id;
        Logbook::where('id', Crypt::decryptString($request->id))->update($validateData);
        return redirect('/dashboard/logbooks')->with('success', 'post has been updated!');
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
        // dd(Mahasiswa::value('npm'));
        // dd(Crypt::decryptString($npm));
        $decryptedNpm = Crypt::decryptString($npm);
        return view('dashboard.logbooks.index', [
            "logbooks" => Logbook::where('mahasiswa_id', Mahasiswa::where('npm', $decryptedNpm)->pluck('id'))->get(),
            "mahasiswa" => mahasiswa::where('npm', $decryptedNpm)->value('nama')
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
        // dd($logbook->id);
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
        // dd(Carbon::now()->addDays(3)->isoFormat('dddd, D MMMM Y'));
        // dd(Carbon::now()->isoFormat('dddd, D MMMM Y'));

        // if (Carbon::now()->isoFormat('dddd, D MMMM Y') === Carbon::now()->addDays(3)->isoFormat('dddd, D MMMM Y')) {
        //     dd($request->isHadir);
        // }

        $validateData = ['isHadir' => 'required', 'date' => 'required',];
        $validateData['isHadir'] = $request->isHadir;
        $validateData['date'] = Carbon::now()->isoFormat('dddd, D MMMM Y');
        logbook::where('id', $logbook->id)->update($validateData);
        $npm = Mahasiswa::where('id', $logbook->mahasiswa_id)->value('npm');
        return redirect('/dashboard/logbooks/mhs/' . Crypt::encryptString($npm))->with('success', 'post has been updated!');
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
