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
        $num_of_cities = DB::table('cities')->count(); // Number of rows in cities table
        $num_of_venues = DB::table('venues')->count(); // Number of rows in venues table
        return [
            'name' => fake()->city() . ' ' . fake()->word(),
            'city_id' => fake()->NumberBetween(1, $num_of_cities), // ID for the city a team belongs to
            'venue_id' => fake()->NumberBetween(1, $num_of_cities), // ID for the venue which belongs to a team
        ];
    }
}
