<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'street' => fake()->streetAddress(),
            'postalCode' => fake()->postcode(),
            'city'=> fake()->city(),
            'countryCode' => fake()->countryCode(),
        ];
    }
}
