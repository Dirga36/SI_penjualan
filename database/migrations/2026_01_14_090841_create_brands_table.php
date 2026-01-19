<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration Tabel Brands
 *
 * Membuat tabel brands untuk manufaktur/merek produk.
 * Brand berelasi dengan produk dan ditampilkan dengan logo.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();                 // Primary key auto-increment
            $table->string('name');       // Nama brand (contoh: "Nike", "Adidas")
            $table->string('slug');       // Versi URL-friendly (dibuat otomatis dari nama)
            $table->string('logo');       // Path ke file gambar logo brand
            $table->softDeletes();        // deleted_at untuk soft deletion
            $table->timestamps();         // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
