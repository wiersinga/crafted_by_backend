<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\Category;
use App\Models\Color;
use App\Models\Material;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use App\Models\Product_item;
use App\Models\Review;
use App\Models\Role;
use App\Models\Size;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


       // AddressFactory

        //Address::factory(10)->create();

        // RoleFactory

        //Role::factory(3)->create();

        // CategoryFactory

       // Category::factory(10)->create();

        // ColorFactory

        //Color::factory(10)->create();

        // SizeFactory

      //  Size::factory(5)->create();

        // MaterialFactory

        //Material::factory(10)->create();

        // SpecialityFactory

       // Speciality::factory(10)->create();

        // OrderFactory

        //Order::factory(10)->create();

        // UserFactory

      //  User::factory(10)->create();

        // User::factory(10)->hasAttached(Address::inRandomOrder()->first()->id,Role::inRandomOrder()->first()->id)->create();

        // ProductFactory

       // Product::factory(10)->create();

        // ProductFactory

        //$product = Product::factory()->create();

        // ReviewFactory

      //  Review::factory(10)->create();

        // Product_itemFactory
       //Product_item::factory(3)->create();

        //Order_item::factory(10)->create();




    }
}
