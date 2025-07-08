<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Catatan;

class CatatanController extends Controller
{
    /**
     * Tampilkan form untuk membuat catatan baru
     */
    public function create()
    {
        return view('catatan.create'); // pastikan file view ada
    }

    /**
     * Simpan catatan baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_tanaman' => 'required|string|max:255',
            'lokasi_tanaman' => 'nullable|string|max:255',
            'kondisi_cuaca' => 'nullable|string|max:255',
            'suhu' => 'required|numeric|min:-100|max:100',
            'kelembapan' => 'required|integer|min:1|max:100',
            'penyiraman' => 'nullable|string|max:255',
            'pemupukan' => 'nullable|string|max:255',
            'pertumbuhan_tanaman' => 'nullable|string',
            'kondisi_tanaman' => 'nullable|string',
            'perlakuan_khusus' => 'nullable|string',
            'catatan_tambahan' => 'nullable|string',
        ]);

        Catatan::create([
            'user_id' => Auth::id(), // ID pengguna yang login
            'tanggal' => $request->tanggal,
            'nama_tanaman' => $request->nama_tanaman,
            'lokasi_tanaman' => $request->lokasi_tanaman,
            'kondisi_cuaca' => $request->kondisi_cuaca,
            'suhu' => $request->suhu,
            'kelembapan' => $request->kelembapan,
            'penyiraman' => $request->penyiraman,
            'pemupukan' => $request->pemupukan,
            'pertumbuhan_tanaman' => $request->pertumbuhan_tanaman,
            'kondisi_tanaman' => $request->kondisi_tanaman,
            'perlakuan_khusus' => $request->perlakuan_khusus,
            'catatan_tambahan' => $request->catatan_tambahan,
        ]);

        return redirect('/index#contact')->with('success', 'Catatan berhasil ditambahkan.');
    }

    public function indexSelected()
    {
        $catatans = Catatan::where('user_id', Auth::id())
                    ->select('nama_tanaman', 'tanggal', 'kondisi_cuaca', 'penyiraman', 'lokasi_tanaman')
                    ->orderBy('tanggal', 'desc')
                    ->limit(10)
                    ->get();

        return view('index', compact('catatans'));
    }
}
