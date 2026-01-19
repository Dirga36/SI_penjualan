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

    /**
     * Atribut yang dapat diisi secara massal.
     * Field-field ini dapat diisi menggunakan method create() atau fill()
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',      // Nama lengkap user
        'email',     // Alamat email user (unik, digunakan untuk login)
        'password',  // Password user yang di-hash
    ];

    /**
     * Atribut yang harus disembunyikan untuk serialisasi.
     * Field-field ini tidak akan disertakan ketika model dikonversi ke JSON/array
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',        // Jangan pernah expose password di response API
        'remember_token',  // Jangan pernah expose remember token untuk keamanan
    ];

    /**
     * Dapatkan atribut yang harus di-cast.
     * Otomatis konversi tipe atribut ketika mengakses/menyetting
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',  // Cast ke instance Carbon datetime
            'password' => 'hashed',             // Otomatis hash saat di-assign
        ];
    }
}
