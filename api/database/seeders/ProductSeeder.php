<?php

namespace Database\Seeders;


use App\Models\Material;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Product::factory()
          ->count(10)
          ->create()
          ->each(function ($product){
              $product->materials()->attach(Material::all()->random(1)->pluck('id')->toArray());
          });
    }
}
