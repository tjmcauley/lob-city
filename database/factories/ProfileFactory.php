<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $num_of_users = DB::table('users')->count();
        return [
            'user_id' => fake()->unique()->numberBetween(2, $num_of_users),
            'email' => fake()->unique()->email(),
            'username' => fake()->unique()->username(),
            'password' => fake()->password(),
        ];
    }
}
