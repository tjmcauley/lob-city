<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use App\Models\Stat;
use App\Models\Player;

class PlayerStatsContainer
{

    protected $url = 'http://b8c40s8.143.198.70.30.sslip.io/api/PlayerDataTotals/name/'; 

    public function player_stats_api(Player $player): void
    {
        # API call to get info about the given player
        $response = Http::get('http://b8c40s8.143.198.70.30.sslip.io/api/PlayerDataTotals/name/' . $player->name);
        if ($response->failed()) {
            echo 'No stats for ' . $player->name . '. Continuing...' . PHP_EOL;
        } else {
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