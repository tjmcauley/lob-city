<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use App\Models\City;
use App\Models\Venue;
use App\Models\Team;
use App\Models\Player;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = City::all();
        $venues = Venue::all();
        $teams = Team::all();
        $players = Player::all();

        foreach ($cities as $city) {
            $t = new Tag;
            $t->name = $city->name;
            $t->save();
        }

        foreach ($venues as $venue) {
            $t = new Tag;
            $t->name = $venue->name;
            $t->save();
        }

        foreach ($teams as $team) {
            $t = new Tag;
            $t->name = $team->name;
            $t->save();
        }

        foreach ($players as $player) {
            $t = new Tag;
            $t->name = $player->name;
            $t->save();
        }

    }
}
