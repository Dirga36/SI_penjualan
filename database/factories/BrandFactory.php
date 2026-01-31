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
            'new-balance.jpg',
            'reebok.jpg',
            'converse.jpg',
            'asics.jpg',
            'timberland.jpg',
        ];

        static $index = 0;
        $currentIndex = $index % count($brands);
        $index++;

        return [
            'name' => $brands[$currentIndex],
            'logo' => '/images/assets-brands/'.$logos[$currentIndex],
        ];
    }
}
