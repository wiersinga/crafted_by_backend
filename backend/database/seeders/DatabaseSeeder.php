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
        $this->call([
            AddressSeeder::class,
            CategorySeeder::class,
            SpecialitySeeder::class,
            MaterialSeeder::class,
            RoleSeeder::class,
            ColorSeeder::class,
            SizeSeeder::class,
            ThemeSeeder::class,
            OrderSeeder::class,
            UserSeeder::class,
            ArtistSeeder::class,
            ProductSeeder::class,
            ReviewSeeder::class,
            Product_itemSeeder::class,
            Order_itemSeeder::class,
            ]);

    }
}
