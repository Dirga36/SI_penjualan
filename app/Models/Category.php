<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Model Category
 * 
 * Merepresentasikan kategori produk dalam sistem e-commerce.
 * Kategori mengorganisir produk dan ditampilkan dengan icon custom untuk UI.
 */
class Category extends Model
{
    // HasFactory: Mengaktifkan pola factory untuk testing dan seeding
    // SoftDeletes: Mengimplementasikan soft deletion (menandai sebagai terhapus tanpa menghapus dari database)
    use HasFactory, SoftDeletes;
    
    /**
     * Atribut yang dapat diisi secara massal
     * Field-field ini dapat diisi menggunakan method create() atau fill()
     */
    protected $fillable = [
        'name',  // Nama kategori (contoh: "Sepatu", "Pakaian")
        'slug',  // Versi URL-friendly dari nama (dibuat otomatis)
        'icon',  // Path ke file gambar icon kategori
    ];

    /**
     * Relasi: Category memiliki banyak Produk
     * 
     * @return HasMany Koleksi produk yang termasuk dalam kategori ini
     */
    public function produks(): HasMany
    {
        return $this->hasMany(related: Produk::class);
    }

    /**
     * Otomatis generate slug ketika name di-set
     * 
     * Mutator ini mengintersep penugasan nama dan membuat slug yang URL-friendly.
     * Contoh: "Sepatu Lari" menjadi "sepatu-lari"
     * 
     * @param string $value Nama kategori yang sedang di-set
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug(title: $value);
    }
}

