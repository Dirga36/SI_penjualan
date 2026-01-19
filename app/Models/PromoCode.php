<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model PromoCode
 *
 * Merepresentasikan kode diskon promosi yang dapat digunakan pelanggan pada transaksi.
 * Kode memberikan potongan diskon dalam jumlah tetap dari total pembelian.
 */
class PromoCode extends Model
{
    // HasFactory: Mengaktifkan pola factory untuk testing dan seeding
    // SoftDeletes: Mengimplementasikan soft deletion (menandai sebagai terhapus tanpa menghapus dari database)
    use HasFactory, SoftDeletes;

    /**
     * Atribut yang dapat diisi secara massal
     * Field-field ini dapat diisi menggunakan method create() atau fill()
     */
    protected $fillable = [
        'code',              // String kode promo unik (contoh: "SUMMER2026")
        'discount_ammount',  // Jumlah diskon tetap dalam unit mata uang dasar
    ];
}
