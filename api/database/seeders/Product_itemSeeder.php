<?php

namespace Database\Seeders;

use App\Models\Product_item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Product_itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product_item::factory()
            ->count(10)
            ->create();
    }
}
