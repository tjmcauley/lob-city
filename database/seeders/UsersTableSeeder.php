<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $u1 = new User;
        $u1->name = "John Test";
        $u1->date_of_birth = "2000-01-01";
        $u1->save();

        User::factory()->count(5)->create();
    }
}
