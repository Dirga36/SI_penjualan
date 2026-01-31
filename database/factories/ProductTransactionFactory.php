<?php

namespace Database\Factories;

use App\Models\ProductTransaction;
use App\Models\Produk;
use App\Models\PromoCode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductTransaction>
 */
class ProductTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $proofs = [
            'proof-1.jpg',
            'proof-2.jpg',
            'proof-3.jpg',
            'proof-4.jpg',
            'proof-5.jpg',
        ];

        $quantity = $this->faker->numberBetween(1, 5);
        $produk = Produk::factory()->create();
        $subTotal = $produk->price * $quantity;
        $discountAmount = 0;
        $grandTotal = $subTotal;

        // 40% chance to apply a promo code
        if ($this->faker->boolean(40)) {
            $promo = PromoCode::factory()->create();
            $discountAmount = min($promo->discount_ammount, $subTotal);
            $grandTotal = $subTotal - $discountAmount;
        }

        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'booking_trx_id' => ProductTransaction::generateUniqueTrxId(),
            'city' => $this->faker->city(),
            'post_code' => $this->faker->postcode(),
            'address' => $this->faker->address(),
            'quantity' => $quantity,
            'sub_total_amount' => $subTotal,
            'grand_total_amount' => $grandTotal,
            'discount_amount' => $discountAmount,
            'is_paid' => $this->faker->boolean(60),
            'produk_id' => $produk->id,
            'produk_size' => $this->faker->randomElement(['35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45']),
            'proof' => '/images/assets-product-transactions/'.$this->faker->randomElement($proofs),
        ];
    }
}
