<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

public function proseslogin(Request $request)
{
    $data = $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    if (Auth::attempt($data)) {

        // 🔥 INI YANG KURANG
        $request->session()->regenerate();
        
        logAktivitas('User masuk ke sistem');

        // 🔥 CEK ROLE
    if (auth()->user()->role == 'admin') {
        return redirect('/dashboard');
    } elseif (auth()->user()->role == 'petugas') {
        return redirect('/transaksi');
    } else {
        return redirect('/laporan'); // 🔥 owner
    }
    }


    return back()->with('error', 'Email atau password salah');
}

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
