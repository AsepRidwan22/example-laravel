<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->roles === 'koordinator') {
            return view('dashboard.dosens.index', [
                'dosens' => Dosen::all(),
                'mahasiswas' => Mahasiswa::all()
            ]);
        } else if (auth()->user()->roles === 'mahasiswa') {

            $dosen_id = Mahasiswa::where('id', auth()->user()->id)->value('dosen_id');

            return view('dashboard.dosens.index', [
                'dosens' => Dosen::where('id', $dosen_id)->get(),
                'mahasiswas' => Mahasiswa::all()
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
        return view('dashboard.dosens.create', [
            'users' => User::where('roles', 'dosen')->get()->last()
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
        // dd($request);

        $rules = [
            'nama' => 'required|max:255',
            'nidn' => 'required|unique:dosens',
            'email' => 'required|email:dns|unique:dosens',
        ];

        $validateData = $request->validate($rules);

        $validated = Validator::make($validateData, $rules);

        if (!$validated->fails()) {
            User::create([
                'username' => $request->nidn,
                'roles' => 'dosen',
                'password' => bcrypt('12345')
            ]);
        }

        $validateData['user_id'] = User::where('username', $request->nidn)->value('id');

        Dosen::create($validateData);

        return redirect('/dashboard/dosens')->with('success', 'New post has been added!');
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
