<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials= ['bois','verre','fer','plastique','or','argent','pierre','papier','cuivre'];
        foreach ($materials as $material){
            Material::create([
                'name'=>$material
            ]);
        }
    }
}
