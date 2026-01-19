<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration Tabel Produks (Products)
 *
 * Membuat tabel products utama - entitas sentral dalam sistem e-commerce.
 * Produk terkait dengan kategori dan brand, memiliki harga, stok, dan flag popularitas.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();                                 // Primary key auto-increment
            $table->string('name');                       // Nama produk
            $table->string('slug');                       // Versi URL-friendly (dibuat otomatis)
            $table->string('thumbnail');                  // Path gambar utama produk
            $table->text('about');                        // Deskripsi/detail produk
            $table->unsignedBigInteger('price');          // Harga produk (dalam unit mata uang dasar)
            $table->unsignedBigInteger('stock');          // Jumlah stok tersedia
            $table->boolean('is_popular');                // Flag untuk produk unggulan/populer

            // Foreign key ke categories - cascade delete ketika kategori dihapus
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();

            // Foreign key ke brands - cascade delete ketika brand dihapus
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();

            $table->softDeletes();                        // deleted_at untuk soft deletion
            $table->timestamps();                         // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
