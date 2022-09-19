<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Imports\DosenImport;
use Illuminate\Http\Request;
// use Clockwork\Storage\Storage;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
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
                'pembimbing' => $dosen_id,
                'dosens' => Dosen::where('id', $dosen_id)->get(),
                'mahasiswas' => Mahasiswa::all()
            ]);
        }
    }

    public function import(Request $request)
    {
        Excel::import(new DosenImport, $request->file('file'));

        return redirect('/dashboard/dosens')->with('success', 'Dosen beserta akunnya sudah ditambahkan!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.dosens.create', [
            'users' => User::where('roles', 'dosen')->get()->last(),
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
        // dd($request->file('photo') != null);

        $rules = [
            'nama' => 'required|max:255',
            'nidn' => 'required|unique:dosens',
            'email' => 'required|unique:dosens',
            'noHp' => 'required|unique:dosens',
            'linkGroup' => 'required',
            'photo' => 'image|file|max:1024'
        ];

        if ($request->file('photo') != null) {
            $validateData['photo'] = $request->file('photo')->store('profile-photos');
        }

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

        return redirect('/dashboard/dosens')->with('success', 'Dosen Baru Telah Ditambahkan');
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
    public function update(Request $request, Dosen $dosen)
    {
        // dd($request->noHp);
        $rules = [
            'nama' => 'required|max:255',
            'linkGroup' => 'required',
            'photo' => 'image|file|max:1024'
        ];

        if ($request->nidn != $dosen->nidn) {
            $rules['nidn'] = 'required|unique:dosens';
        }

        if ($request->email != $dosen->email) {
            $rules['email'] = 'required|email:dns|unique:dosens';
        }

        if ($request->noHp != $dosen->noHp) {
            $rules['noHp'] = 'required|unique:dosens';
        }

        $validateData = $request->validate($rules);

        // if ($request->file('photo')) {
        //     if ($request->oldImage) {
        //         Storage::delete($request->oldImage);
        //     }
        //     $validateData['image'] = $request->file('image')->store('post-images');
        // }
        Dosen::where('id', $dosen->id)->update($validateData);
        if (auth()->user()->roles === 'koordinator') {
            return redirect('/dashboard/dosens')->with('success', 'Data Dosen Berhasil diubah');
        }
        return redirect('/dashboard/profile')->with('success', 'Identitas Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dosen $dosen)
    {
        // if ($dosen->image) {
        //     Storage::delete($dosen->image);
        // }
        dosen::destroy($dosen->id);
        return redirect('/dashboard/dosens')->with('danger', 'post has been deleted!');
    }
}
