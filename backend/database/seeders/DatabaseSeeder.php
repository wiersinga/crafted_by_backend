<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\Category;
use App\Models\Color;
use App\Models\Material;
use App\Models\Role;
use App\Models\Size;
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

        // AddressFactory

        //Role::factory(3)->create();

        // UserFactory

        //User::factory(10)->create();

        // CategoryFactory

        Category::factory(10)->create();

        // ColorFactory

        Color::factory(10)->create();

        // SizeFactory

        Size::factory(10)->create();

        // MaterialFactory

        Material::factory(10)->create();

        // SpecialityFactory




    }
}
