<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameFactory>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $num_of_teams = DB::table('teams')->count();
        $fake_home_team_id = fake()->NumberBetween(1, $num_of_teams);
        $fake_away_team_id = fake()->NumberBetween(1, $num_of_teams);
        
        // Generate IDs until home and away teams are different
        while ($fake_home_team_id == $fake_away_team_id) {
            $fake_home_team_id = fake()->NumberBetween(1, $num_of_teams);
            $fake_away_team_id = fake()->NumberBetween(1, $num_of_teams);
        }
        
        return [
            'home_team_id' => $fake_home_team_id,
            'away_team_id' => $fake_away_team_id,
            'date' => fake()->date(),
        ];
    }
}
