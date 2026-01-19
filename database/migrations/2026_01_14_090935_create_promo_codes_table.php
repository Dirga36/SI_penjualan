<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration Tabel Promo Codes
 * 
 * Membuat tabel promotional codes untuk fungsi diskon.
 * Menyimpan kode diskon yang dapat digunakan kembali dan diterapkan pelanggan saat checkout.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();                                 // Primary key auto-increment
            $table->string('code');                       // Kode promo unik (contoh: "SUMMER2026")
            $table->unsignedBigInteger('discount_ammount'); // Diskon tetap dalam unit mata uang dasar
            $table->softDeletes();                        // deleted_at untuk soft deletion
            $table->timestamps();                         // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_codes');
    }
};
