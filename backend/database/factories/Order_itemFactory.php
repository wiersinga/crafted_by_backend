<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product_item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order_item>
 */
class Order_itemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id'=> Order::all()->random()->id,
            'product_item_id'=> Product_item::all()->random()->id,
        ];
    }
}
