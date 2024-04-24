<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Art', 'Bijoux', 'Meuble', 'Mode', 'Décoration', 'Cuisine', 'Jardin', 'Littérature', 'Musique', 'Photographie', 'Sport', 'Technologie', 'Enfants',
            'Animaux', 'Bien-être', 'Voyage', 'Cadeaux'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}



