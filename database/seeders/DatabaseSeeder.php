<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductTransaction;
use App\Models\Produk;
use App\Models\PromoCode;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database dengan dummy data untuk testing.
     */
    public function run(): void
    {
        // Buat test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Buat kategori (5 kategori)
        Category::factory(5)->create();

        // Buat brand (5 brand)
        Brand::factory(5)->create();

        // Buat promo codes (5 kode promo)
        PromoCode::factory(5)->create();

        // Buat 1 produk
        $produk = Produk::factory()->create([
            'name' => 'Rovlox',
            'about' => 'SSD',
            'price' => 1000,
            'stock' => 67,
            'is_popular' => true,
            'category_id' => Category::inRandomOrder()->value('id'),
            'brand_id' => Brand::inRandomOrder()->value('id'),
        ]);

        // Buat 1 transaksi untuk produk tersebut
        /*ProductTransaction::factory()->create([
            'name' => 'Caim',
            'phone' => 1212123344,
            'email' => 'example@email.com',
            'booking_trx_id' => 'TJH1200',
            'city' => 'Wesd',
            'post_code' => '12223',
            'address' => 'Wesd, 12223',
            'quantity' => 6,
            'sub_total_ammount' => 12000,
            'grand_total_ammount' => 10000,
            'discount_amount' => 2000,
            'is_paid' => true,
            'produk_size' => 12,
            'proof' => '#',
            'produk_id' => $produk->id,
        ]);*/
    }
}
