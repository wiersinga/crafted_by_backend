<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Speciality;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artist::factory()
            ->count(10)
            ->create();
    }
}
