<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration Tabel Produk Photos
 * 
 * Membuat tabel product photos untuk gambar produk tambahan.
 * Memungkinkan galeri/carousel produk yang menampilkan berbagai sudut atau detail.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk_photos', function (Blueprint $table) {
            $table->id();                          // Primary key auto-increment
            $table->string('photo');               // Path ke file gambar foto
            
            // Foreign key ke tabel produks - cascade delete ketika produk dihapus
            $table->foreignId('produk_id')->constrained('produks')->cascadeOnDelete();
            
            $table->softDeletes();                 // deleted_at untuk soft deletion
            $table->timestamps();                  // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_photos');
    }
};
