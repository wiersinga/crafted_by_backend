<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Speciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialities = [
            'Menuiserie','Métallurgie','Céramique','Textile','Verrerie','Art floral','Joaillerie','Maroquinerie','Art du papier','Sculpture','Peinture',
            'Travail du métal'];
        foreach ($specialities as $speciality){
            Speciality::create([
                'name'=>$speciality
            ]);
        }
    }
}
