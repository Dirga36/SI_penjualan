<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProdukSize>
 */
class ProdukSizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sizes = ['35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45'];

        return [
            'size' => $this->faker->randomElement($sizes),
        ];
    }
}
