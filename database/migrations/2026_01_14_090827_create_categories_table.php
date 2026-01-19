<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration Tabel Categories
 *
 * Membuat tabel categories untuk mengorganisir produk ke dalam grup.
 * Kategori ditampilkan dengan icon di UI untuk identifikasi visual.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();                 // Primary key auto-increment
            $table->timestamps();         // created_at dan updated_at
            $table->string('name');       // Nama kategori (contoh: "Sepatu", "Pakaian")
            $table->string('slug');       // Versi URL-friendly (dibuat otomatis dari nama)
            $table->string('icon');       // Path ke file gambar icon kategori
            $table->softDeletes();        // deleted_at untuk soft deletion
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
