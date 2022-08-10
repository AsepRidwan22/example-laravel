<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Logbook;

class DashboardMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->roles === 'koordinator') {
            return view('dashboard.mahasiswas.index', [
                'mahasiswas' => Mahasiswa::all()
            ]);
        } else if (auth()->user()->roles === 'dosen') {
            $id = Dosen::where('user_id', auth()->user()->id)->pluck('id');
            return view('dashboard.mahasiswas.index', [
                'mahasiswas' => Mahasiswa::where('dosen_id', $id)->get()
            ]);
        } else {
            return 'sia lain sasaha';
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
            'users' => User::where('roles', 'mahasiswa')->get()->last(),
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
        // dd($request);

        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'npm' => 'required',
            'kelas' => 'required',
            'email' => 'required|email',
            'user_id' => 'required',
            'dosen_id' => 'required'
        ]);

        Mahasiswa::create($validateData);

        User::create([
            'username' => $request->npm,
            'roles' => 'mahasiswa',
            'password' => bcrypt('12345')
        ]);

        $user = User::where('roles', 'mahasiswa')->get()->last();
        $mahasiswa = Mahasiswa::all()->last();

        Logbook::factory(7)->create(['user_id' => $user, 'mahasiswa_id' => $mahasiswa]);
        return redirect('/dashboard/mahasiswas')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
