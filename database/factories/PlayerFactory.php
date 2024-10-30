<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $num_of_teams = DB::table('teams')->count(); // Retrieve number of rows in teams table
        return [
            'name' => fake()->name(),
            'team_id' => fake()->NumberBetween(1, $num_of_teams), // Generate an ID showing which team a player plays for
        ];
    }
}