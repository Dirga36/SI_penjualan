<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration Tabel Product Transactions
 *
 * Membuat tabel transactions untuk pembelian pelanggan (booking).
 * Menyimpan informasi lengkap pesanan termasuk detail pelanggan, pengiriman,
 * harga, status pembayaran, dan relasi ke produk dan kode promo.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_transactions', function (Blueprint $table) {
            $table->id();                                    // Primary key auto-increment

            // Informasi Pelanggan
            $table->string('name');                          // Nama lengkap pelanggan
            $table->string('phone');                         // Nomor telepon pelanggan
            $table->string('email');                         // Alamat email pelanggan
            $table->string('booking_trx_id');                // ID transaksi unik (dengan prefix TJH)

            // Informasi Pengiriman
            $table->string('city');                          // Kota pengiriman
            $table->string('post_code');                     // Kode pos pengiriman
            $table->string('proof');                         // Path ke gambar bukti pembayaran
            $table->text('address');                         // Alamat lengkap pengiriman

            // Detail Pesanan
            $table->unsignedBigInteger('produk_size');       // Ukuran produk yang dipilih
            $table->unsignedBigInteger('quantity');          // Jumlah item yang dibeli

            // Harga
            $table->unsignedBigInteger('sub_total_amount');  // Subtotal sebelum diskon
            $table->unsignedBigInteger('grand_total_amount'); // Jumlah akhir setelah diskon
            $table->unsignedBigInteger('discount_amount')->default(0); // Total diskon yang diterapkan

            // Status Pembayaran
            $table->boolean('is_paid');                      // Flag penyelesaian pembayaran

            // Foreign Keys
            // Link ke product - cascade delete ketika produk dihapus
            $table->foreignId('produk_id')->constrained('produks')->cascadeOnDelete();

            // Link ke promo code - set null ketika kode promo dihapus
            $table->foreignId('promo_code_id')->nullable()->constrained('promo_codes')->nullOnDelete();

            $table->softDeletes();                           // deleted_at untuk soft deletion
            $table->timestamps();                            // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_transactions');
    }
};
