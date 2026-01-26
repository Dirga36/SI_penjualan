<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductTransaction;
use App\Models\Produk;
use App\Models\ProdukPhoto;
use App\Models\ProdukSize;
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
        $categories = Category::factory(5)->create();

        // Buat brand (5 brand)
        $brands = Brand::factory(5)->create();

        // Buat promo codes (5 kode promo)
        $promoCodes = PromoCode::factory(5)->create();

        // Buat produk dengan photos dan sizes (10 produk)
        Produk::factory(10)
            ->sequence(fn () => [
                'category_id' => $categories->random()->id,
                'brand_id' => $brands->random()->id,
            ])
            ->create()
            ->each(function (Produk $produk) {
                // Setiap produk mendapat 2-4 foto
                ProdukPhoto::factory(rand(2, 4))->create([
                    'produk_id' => $produk->id,
                ]);

                // Setiap produk mendapat 2-5 pilihan ukuran
                ProdukSize::factory(rand(2, 5))->create([
                    'produk_id' => $produk->id,
                ]);
            });

        // Buat transaksi (15 transaksi)
        ProductTransaction::factory(15)->create();
    }
}
