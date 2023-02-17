<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Masyarakat;
use App\Models\User;

class AuthController extends Controller
{
    public function register() 
    {
        return view('auth.register');
    }

    public function register_action(Request $request) 
    {
        $validate = $request->validate([
            'nama' => 'required', 
            'username' => 'required', 
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'telp' => 'required'
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp
        ]);

        Masyarakat::create([
            'nik' => $request->nik,
            'user_id' =>  $user->id
        ]);

        return view('auth.login');
    }

    public function authenticate(Request $request) 
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // dd($credentials);

        // dd(Auth::user());
        if (Auth::attempt($credentials)) {
            if (Masyarakat::where('user_id', Auth::id())->exists()) {
                $request->session()->regenerate();

                return redirect()->route('masyarakat.dashboard');
            } else {
                $request->session()->regenerate();

                return redirect()->route('petugas.dashboard');
            }
        }

        return back()->withErrors([
            'username' => 'Data kamu tidak ada didalam',
        ])->onlyInput('username');
    }

    public function login(Request $request) 
    {
        return view('auth.login');
    }

    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
