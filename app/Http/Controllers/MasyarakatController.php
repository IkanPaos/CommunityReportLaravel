<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    public function register()
    {
        $data['title'] = 'Register';
        return view('masyarakat/register', $data);
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:masyarakat',
            'nama' => 'required',
            'username' => 'required',
            'telp' => 'required',
            'password' => 'required',
        ]);

        $user = new User([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'telp' => $request->telp,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        return redirect()->route('login')->with('succes', 'Registration succes. Please login!');
    }

    public function login()
    {
        $data['title'] = 'Login';
        return view('masyarakat/login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['nik' => $request->nik, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'password' => 'Wrong NIK or Password!!!'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect ('login');
    }
}
