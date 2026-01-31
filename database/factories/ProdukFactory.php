<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $thumbnails = [
            'produk-1.jpg',
            'produk-2.jpg',
            'produk-3.jpg',
            'produk-4.jpg',
            'produk-5.jpg',
        ];

        return [
            'name' => $this->faker->words(3, true),
            'thumbnail' => '/images/assets-produks/'.$this->faker->randomElement($thumbnails),
            'about' => $this->faker->paragraph(3),
            'price' => $this->faker->numberBetween(100000, 2000000),
            'stock' => $this->faker->numberBetween(1, 100),
            'is_popular' => $this->faker->boolean(30),
            'category_id' => Category::factory(),
            'brand_id' => Brand::factory(),
        ];
    }

    /**
     * Indicate that the product is popular.
     */
    public function popular()
    {
        return $this->state(fn (array $attributes) => [
            'is_popular' => true,
        ]);
    }
}
