<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * Model Produk (Product)
 *
 * Entitas utama dalam sistem e-commerce yang merepresentasikan produk yang dijual.
 * Produk terkait dengan kategori dan brand, serta memiliki banyak foto dan ukuran.
 * Dapat ditandai sebagai populer untuk tampilan unggulan.
 */
class Produk extends Model
{
    // HasFactory: Mengaktifkan pola factory untuk testing dan seeding
    // SoftDeletes: Mengimplementasikan soft deletion (menandai sebagai terhapus tanpa menghapus dari database)
    use HasFactory, SoftDeletes;

    /**
     * Atribut yang dapat diisi secara massal
     * Field-field ini dapat diisi menggunakan method create() atau fill()
     */
    protected $fillable = [
        'name',         // Nama produk
        'slug',         // Versi URL-friendly dari nama (dibuat otomatis)
        'thumbnail',    // Path gambar utama produk
        'about',        // Deskripsi/detail produk
        'price',        // Harga produk dalam unit mata uang dasar
        'stock',        // Jumlah stok tersedia
        'is_popular',   // Flag boolean untuk produk unggulan/populer
        'category_id',  // Foreign key ke tabel categories
        'brand_id',      // Foreign key ke tabel brands
    ];

    /**
     * Otomatis generate slug ketika name di-set
     *
     * Mutator ini mengintersep penugasan nama dan membuat slug yang URL-friendly.
     * Contoh: "Nike Air Max 90" menjadi "nike-air-max-90"
     *
     * @param  string  $value  Nama produk yang sedang di-set
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Relasi: Produk dimiliki oleh satu Brand
     *
     * @return BelongsTo Brand yang terkait dengan produk ini
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    /**
     * Relasi: Produk termasuk dalam satu Category
     *
     * @return BelongsTo Kategori dimana produk ini diklasifikasikan
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Relasi: Produk memiliki banyak Foto
     *
     * @return HasMany Koleksi foto produk untuk tampilan galeri
     */
    public function photos(): HasMany
    {
        return $this->hasMany(ProdukPhoto::class);
    }

    /**
     * Relasi: Produk memiliki banyak Ukuran
     *
     * @return HasMany Koleksi ukuran yang tersedia untuk produk ini
     */
    public function sizes(): HasMany
    {
        return $this->hasMany(ProdukSize::class);
    }
}
