<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brands = [
            'Nike',
            'Adidas',
            'Puma',
            'Skechers',
            'New Balance',
            'Reebok',
            'Converse',
            'Vans',
            'Asics',
            'Timberland',
        ];

        return [
            'name' => $this->faker->randomElement($brands),
            'logo' => $this->faker->imageUrl(150, 150, 'business'),
        ];
    }
}
