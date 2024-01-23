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
            'speciality_id'=> Speciality::all()->random(1)->value('id'),
            'user_id'=> User::all()->random(1)->value('id'),
            'theme_id' =>Theme::all()->random(1)->value('id'),
        ];
    }
}
