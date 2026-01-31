<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model ProductTransaction
 *
 * Merepresentasikan transaksi pembelian pelanggan (booking) dalam sistem.
 * Menyimpan informasi pelanggan, detail produk, harga, dan status pembayaran.
 * Setiap transaksi memiliki ID booking unik dengan prefix TJH.
 */
class ProductTransaction extends Model
{
    // HasFactory: Mengaktifkan pola factory untuk testing dan seeding
    // SoftDeletes: Mengimplementasikan soft deletion (menandai sebagai terhapus tanpa menghapus dari database)
    use HasFactory, SoftDeletes;

    /**
     * Atribut yang dapat diisi secara massal
     * Field-field ini dapat diisi menggunakan method create() atau fill()
     */
    protected $fillable = [
        'name',                 // Nama lengkap pelanggan
        'phone',                // Nomor telepon pelanggan
        'email',                // Alamat email pelanggan
        'booking_trx_id',       // ID transaksi unik (dengan prefix TJH)
        'city',                 // Kota pengiriman
        'post_code',            // Kode pos pengiriman
        'address',              // Alamat lengkap pengiriman
        'quantity',             // Jumlah item yang dibeli
        'sub_total_ammount',    // Total sebelum diskon
        'grand_total_ammount',  // Jumlah akhir setelah diskon
        'discount_ammount',     // Total diskon yang diterapkan
        'is_paid',              // Status pembayaran boolean
        'produk_id',            // Foreign key ke produk yang dibeli
        'produk_size',          // Ukuran yang dipilih untuk produk
        'promo_code_id',        // Foreign key ke kode promo yang diterapkan (nullable)
        'proof',                // Path ke gambar bukti pembayaran
    ];

    /**
     * Generate ID transaksi unik dengan prefix TJH
     *
     * Membuat ID booking unik dalam format: TJH12345
     * Terus generate ID random sampai menemukan yang tidak ada di database.
     *
     * @return string ID transaksi unik (contoh: "TJH54321")
     */
    public static function generateUniqueTrxId(): string
    {
        $prefix = 'TJH';
        do {
            // Generate angka random 5 digit antara 10001-99999
            $randomString = $prefix.mt_rand(10001, 99999);
        } while (self::where('booking_trx_id', $randomString)->exists());

        return $randomString;
    }

    /**
     * Relasi: Transaksi dimiliki oleh satu Produk
     *
     * @return BelongsTo Produk yang dibeli dalam transaksi ini
     */
    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    /**
     * Relasi: Transaksi dimiliki oleh satu Promo Code (opsional)
     *
     * @return BelongsTo Kode promo yang diterapkan pada transaksi ini (jika ada)
     */
    public function promoCode(): BelongsTo
    {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }
}
