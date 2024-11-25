<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'customer_id' => rand(1, Customer::count()),
            // １～カスタマーの数だけランダムな整数をつくる
            'status' => $this->faker->boolean,
            // ランダムなbooleanをつくる。1か0.
        ];
    }
}
