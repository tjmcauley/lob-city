<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p1 = new Player;
        $p1->name = "Lebron James";
        $p1->team_id = 1;
        $p1->save();

        $p2 = new Player;
        $p2->name = "Kawhi Leonard";
        $p2->team_id = 2;
        $p2->save();
    }
}
