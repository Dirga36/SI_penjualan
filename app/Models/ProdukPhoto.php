<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model ProdukPhoto
 *
 * Merepresentasikan foto tambahan produk untuk tampilan galeri/carousel.
 * Setiap produk dapat memiliki beberapa foto untuk menampilkan sudut atau detail yang berbeda.
 */
class ProdukPhoto extends Model
{
    // HasFactory: Mengaktifkan pola factory untuk testing dan seeding
    // SoftDeletes: Mengimplementasikan soft deletion (menandai sebagai terhapus tanpa menghapus dari database)
    use HasFactory, SoftDeletes;

    /**
     * Atribut yang dapat diisi secara massal
     * Field-field ini dapat diisi menggunakan method create() atau fill()
     */
    protected $fillable = [
        'photo',      // Path ke file gambar foto
        'produk_id',  // Foreign key yang menghubungkan ke produk induk
    ];
}
