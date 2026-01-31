<?php

namespace Database\Factories;

use Database\Factories\Concerns\HasLocalImages;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProdukPhoto>
 */
class ProdukPhotoFactory extends Factory
{
    use HasLocalImages;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo' => $this->getLocalImage('products', 400, 400, 'fashion'),
        ];
    }
}
