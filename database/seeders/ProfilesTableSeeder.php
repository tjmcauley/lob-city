<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p1 = new Profile;
        $p1->user_id = 1;
        $p1->save();

        $p2 = new Profile;
        $p2->user_id = 2;
        $p2->save();

        $p3 = new Profile;
        $p3->user_id = 3;
        $p3->save();

        Profile::factory()->count(2)->create();
    }
}
