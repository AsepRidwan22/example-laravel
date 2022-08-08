<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{
    public function index()
    {
        return view('dashboard.dosens.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function indexMhs()
    {
        return view('dashboard.mahasiswas.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            // 'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'unique:users'],
            'roles' => ['required'],
            // 'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);


        User::create($validatedData);

        // $request->session()->flash('success', 'Registration successfull! Please login');
        // return redirect('/login');

        if ($validatedData['roles'] == 'dosen') {
            return redirect('/dashboard/dosens/create')->with('success', 'Registration successfull! Please login');
        } else {
            return redirect('/dashboard/mahasiswas/create')->with('success', 'Registration successfull! Please login');
        }
    }
}
