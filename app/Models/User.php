<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
   use HasFactory, Notifiable;

    // Nama tabel yang digunakan (opsional jika mengikuti Laravel default: 'penggunas')
    protected $table = 'users';

    // Kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'nama',
        'email',
        'notelp',
        'username',
        'password',
    ];

    // Kolom yang disembunyikan saat model dikonversi ke array/json
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tipe data yang perlu di-cast
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi: satu pengguna bisa punya banyak catatan
    public function catatans()
    {
        return $this->hasMany(Catatan::class, 'user_id');
    }
}
