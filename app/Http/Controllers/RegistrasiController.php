<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistrasiController extends Controller
{
    // Tampilkan form registrasi
    public function showForm()
    {
        return view('registrasi'); // Pastikan view ini ada
    }

    // Proses data registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'notelp' => 'required',
            'username' => 'required|unique:users,username',
            'password' => [
                'required',
                'min:6',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ],
        ], [
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, dan angka.',
            'email.unique' => 'Email sudah digunakan orang lain.',
        ]);

        // Simpan data pengguna baru
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'notelp' => $request->notelp,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function showProfile()
    {
        $user = User::where('id', Auth::id())
                    ->select('nama', 'email', 'notelp', 'username')
                    ->first();

        return view('profil', compact('user'));
    }
}
