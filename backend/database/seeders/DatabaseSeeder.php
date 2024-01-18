<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\Role;
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

        //Address::factory(5)->create();

        // AddressFactory

        //Role::factory(3)->create();

        // UserFactory

//        User::factory(10)->create();
//        User::factory()->unverified()->create();

        $user= User::factory()->has(Address::factory()->count(3))->create();
        $addresses = Address::factory(10)->create();
        foreach ($addresses as $address ){

        User::factory()
            ->hasAttached(User::factory())
            ->create([
            'address_id'=>$address->id
        ]);
    }
    }
}
