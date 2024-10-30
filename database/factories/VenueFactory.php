<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venue>
 */
class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $num_of_teams = DB::table('teams')->count(); // Retrieve number of rows in teams table
        $num_of_cities = DB::table('cities')->count(); // Retrieve number of rows in city table
        $venue_names = ['Center', 'Arena', 'Forum', 'Garden', 'Fieldhouse'];
        return [
            'name' => fake()->company() . ' ' . fake()->randomElement($venue_names),
            'team_id' => fake()->NumberBetween(1, $num_of_teams), // Generate an ID showing which team a player plays for
            'city_id' => fake()->NumberBetween(1, $num_of_cities), // Generate an ID showing which team a player plays for
        ];
    }
}
