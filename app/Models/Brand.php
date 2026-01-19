<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * Model Brand
 *
 * Merepresentasikan brand/merek produk dalam sistem e-commerce.
 * Brand berelasi dengan banyak produk dan memiliki logo branding.
 */
class Brand extends Model
{
    // HasFactory: Mengaktifkan pola factory untuk testing dan seeding
    // SoftDeletes: Mengimplementasikan soft deletion (menandai sebagai terhapus tanpa menghapus dari database)
    use HasFactory, SoftDeletes;

    /**
     * Atribut yang dapat diisi secara massal
     * Field-field ini dapat diisi menggunakan method create() atau fill()
     */
    protected $fillable = [
        'name',   // Nama brand (contoh: "Nike", "Adidas")
        'slug',   // Versi URL-friendly dari nama (dibuat otomatis)
        'logo',    // Path ke file gambar logo brand
    ];

    /**
     * Otomatis generate slug ketika name di-set
     *
     * Mutator ini mengintersep penugasan nama dan membuat slug yang URL-friendly.
     * Contoh: "Nike Air" menjadi "nike-air"
     *
     * @param  string  $value  Nama brand yang sedang di-set
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Relasi: Brand memiliki banyak Produk
     *
     * @return HasMany Koleksi produk yang dimiliki brand ini
     */
    public function produks(): HasMany
    {
        return $this->hasMany(Produk::class);
    }
}
