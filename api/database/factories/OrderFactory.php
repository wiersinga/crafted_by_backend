<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'orderNum'=> fake()->numberBetween(1,10000),
            'paymentStatus'=> fake()->boolean,
            'totalPrice'=> fake()->randomFloat(2,0,1000),
            'user_id'=> User::all()->random(1)->value('id'),
        ];
    }
}
