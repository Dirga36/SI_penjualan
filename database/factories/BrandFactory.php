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

        $logos = [
            'nike.jpg',
            'adidas.jpg',
            'puma.jpg',
            'skechers.jpg',
            'new-balance.jpg',
            'reebok.jpg',
            'converse.jpg',
            'vans.jpg',
            'asics.jpg',
            'timberland.jpg',
        ];

        return [
            'name' => $this->faker->randomElement($brands),
            'logo' => '/images/assets-brands/'.$this->faker->randomElement($logos),
        ];
    }
}
