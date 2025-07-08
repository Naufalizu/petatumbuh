<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Catatan extends Model
{
    use HasFactory;

    protected $table = 'catatans';

    protected $fillable = [
        'user_id',
        'tanggal',
        'nama_tanaman',
        'lokasi_tanaman',
        'kondisi_cuaca',
        'suhu',
        'kelembapan',
        'penyiraman',
        'pemupukan',
        'pertumbuhan_tanaman',
        'kondisi_tanaman',
        'perlakuan_khusus',
        'catatan_tambahan',
    ];

    /**
     * Relasi: Catatan milik satu User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
