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
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database dengan dummy data untuk testing.
     */
    public function run(): void
    {
        // Buat test user
        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        // Buat kategori (5 kategori)
        Category::factory(5)->create();

        // Buat brand (5 brand)
        Brand::factory(5)->create();

        // Buat promo codes (5 kode promo)
        PromoCode::factory(5)->create();

        // Buat 1 produk
        $produk = Produk::factory()->create();

        // Buat 1 transaksi untuk produk tersebut
        DB::table('product_transactions')->insert([
            'name' => 'Dirge',
            'phone' => 1212123344,
            'email' => 'example@email.com',
            'booking_trx_id' => 'TJH1200',
            'city' => 'Wesd',
            'post_code' => '12223',
            'address' => 'Wesd, 12223',
            'produk_id' => $produk->id,
            'quantity' => 6,
            'sub_total_ammount' => $produk->price,
            'discount_ammount' => PromoCode::inRandomOrder()->value('id'),
            'grand_total_ammount' => $produk->price - PromoCode::inRandomOrder()->value('id'),
            'is_paid' => true,
            'produk_size' => 12,
            'proof' => '#',
        ]);
    }
}
