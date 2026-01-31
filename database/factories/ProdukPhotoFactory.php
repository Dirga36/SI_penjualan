<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProdukPhoto>
 */
class ProdukPhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $photos = [
            'product-photo-1.jpg',
            'product-photo-2.jpg',
            'product-photo-3.jpg',
            'product-photo-4.jpg',
            'product-photo-5.jpg',
        ];

        return [
            'photo' => '/images/assets-produck-photos/'.$this->faker->randomElement($photos),
        ];
    }
}
