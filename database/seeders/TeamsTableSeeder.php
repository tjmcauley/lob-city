<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $t1 = new Team;
        $t1->name = "Los Angeles Lakers";
        $t1->city_id = 1;
        $t1->save();

        $t2 = new Team;
        $t2->name = "Los Angeles Clippers";
        $t2->city_id = 1;
        $t2->save();
    }
}
