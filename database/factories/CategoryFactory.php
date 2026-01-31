<?php

namespace Database\Factories;

use Database\Factories\Concerns\HasLocalImages;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    use HasLocalImages;
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
            'Boots',
            'Sneakers',
            'Sepatu Formal',
            'Sepatu Kasual',
        ];

        return [
            'name' => $this->faker->randomElement($categories),
            'icon' => $this->getLocalImage('categories', 100, 100, 'fashion'),
        ];
    }
}
