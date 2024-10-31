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
        $num_of_cities = DB::table('cities')->count();
        $num_of_venues =  DB::table('venues')->count();

        $city_id = fake()->NumberBetween(1, $num_of_cities);
        $venue_id = fake()->NumberBetween(1, $num_of_venues);

        // Get name of an existing city
        $city_name = DB::table('cities')->where('id', '=', $city_id)
            ->pluck('name')[0];

        return [
            // Basketball team name consists of an existing city + random word
            'name' => $city_name . ' ' . fake()->word(),
            'city_id' => $city_id,
            'venue_id' => $venue_id,
        ];
    }
}
