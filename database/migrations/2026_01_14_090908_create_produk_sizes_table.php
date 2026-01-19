<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration Tabel Produk Sizes
 * 
 * Membuat tabel product sizes untuk variasi ukuran.
 * Menyimpan ukuran yang tersedia (misal: S/M/L/XL, ukuran sepatu) untuk setiap produk.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk_sizes', function (Blueprint $table) {
            $table->id();                          // Primary key auto-increment
            $table->string('size');                // Label ukuran (contoh: "M", "42", "Besar")
            
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
        Schema::dropIfExists('produk_sizes');
    }
};
