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
            'Sepatu Anak',
            'Sandal',
            'sepatu Bot',
            'Sneakers',
            'Sepatu Formal',
            'Sepatu Kasual',
        ];

        $icons = [
            'sepatu-pria.jpg',
            'sepatu-anak.jpg',
            'sandal.jpg',
            'sepatu-bot.jpg',
            'sneakers.jpg',
            'sepatu-formal.jpg',
            'sepatu-kasual.jpg',
        ];

        return [
            'name' => $this->faker->randomElement($categories),
            'icon' => '/images/assets-categories/' . $this->faker->randomElement($icons),
        ];
    }
}
