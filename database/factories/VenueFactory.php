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
        $num_of_cities = DB::table('cities')->count();
        $venue_names = ['Center', 'Arena', 'Forum', 'Garden', 
            'Fieldhouse', 'Dome'];
        
        return [
            'name' => fake()->company() . ' ' 
                . fake()->randomElement($venue_names),
            'city_id' => fake()->NumberBetween(1, $num_of_cities),
        ];
    }
}
