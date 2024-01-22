<?php

namespace Database\Factories;

use App\Models\Speciality;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'siret'=> fake()->bothify('??######'),
            'history'=>fake()->text(300),
            'craftingDescription'=>fake()->text(300),
//            'speciality_id'=> Speciality::factory(),
//            'user_id'=> User::factory(),
//            'theme_id' =>Theme::factory(),
        ];
    }
}
