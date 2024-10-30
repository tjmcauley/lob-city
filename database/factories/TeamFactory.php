<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $num_of_cities = DB::table('cities')->count(); // Retrieve number of rows in city table
        return [
            'name' => fake()->city() . ' ' . fake()->word(),
            'city_id' => fake()->NumberBetween(1, $num_of_cities), // Generate an ID showing which city a team belongs to
        ];
    }
}
