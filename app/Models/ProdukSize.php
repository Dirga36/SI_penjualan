<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model ProdukSize
 * 
 * Merepresentasikan ukuran yang tersedia untuk produk (misal: S, M, L, XL atau ukuran sepatu).
 * Setiap produk dapat memiliki beberapa pilihan ukuran untuk dipilih pelanggan.
 */
class ProdukSize extends Model
{
    // HasFactory: Mengaktifkan pola factory untuk testing dan seeding
    // SoftDeletes: Mengimplementasikan soft deletion (menandai sebagai terhapus tanpa menghapus dari database)
    use HasFactory, SoftDeletes;

    /**
     * Atribut yang dapat diisi secara massal
     * Field-field ini dapat diisi menggunakan method create() atau fill()
     */
    protected $fillable = [
        "size",       // Label ukuran (contoh: "M", "42", "Besar")
        "produk_id",  // Foreign key yang menghubungkan ke produk induk
    ];
}
