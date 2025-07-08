<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Cek apakah user ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Login user secara manual
            Auth::login($user);

            // Redirect ke dashboard atau halaman lain
            return redirect('/index'); // Ganti ini
        }

        // Jika gagal login, kembalikan ke login dengan pesan error
        return back()->withErrors([
            'email' => 'Kombinasi email atau password salah.',
        ])->withInput();
    }

    // Optional: tampilkan form login
    public function showLoginForm()
    {
        return view('login'); // Pastikan file ada di resources/views/auth/login.blade.php
    }

    public function logout(Request $request)
    {
        Auth::logout();                      // Keluar dari sistem
        $request->session()->invalidate();  // Hancurkan sesi
        $request->session()->regenerateToken(); // Regenerasi token CSRF

        return redirect('/index'); // GANTI redirect KE /index
    }
}
