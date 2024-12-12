<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;
use App\Models\Stat;
use App\Models\Player;

class StatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $players = Player::get();
        foreach ($players as $player) {

            # API call to get info about the given player
            $response = Http::get('http://b8c40s8.143.198.70.30.sslip.io/api/PlayerDataTotals/name/' . $player->name);
            if ($response->failed()) {
                echo 'No stats for ' . $player->name . '. Continuing...' . PHP_EOL;
                continue;
            } 

            $stats = $response->json();
            for ($i = 0; $i < count($stats); $i++) {
                $s = new Stat;
                $s->player_id = $player->id;
                $s->season = $stats[$i]['season'];
                $s->games = $stats[$i]['games'];
                $s->points = $stats[$i]['points'];
                $s->assists = $stats[$i]['assists'];
                $s->blocks = $stats[$i]['blocks'];
                $s->steals = $stats[$i]['steals'];
                $s->save();
            }
        } 
    }
}