<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Sepatu Pria',
            'Sepatu Wanita',
            'Sepatu Anak-anak',
            'Sandal',
            'Boots',
            'Sneakers',
            'Formal Shoes',
            'Casual Shoes',
        ];

        return [
            'name' => $this->faker->randomElement($categories),
            'icon' => $this->faker->imageUrl(100, 100, 'fashion'),
        ];
    }
}
