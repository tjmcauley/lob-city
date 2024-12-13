<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;
use App\Models\Stat;
use App\Models\Player;
use App\Services\PlayerStatsContainer;

class StatsTableSeeder extends Seeder
{
    protected $player_stats_service;

    public function __construct(PlayerStatsContainer $player_stats_service)
    {
        $this->player_stats_service = $player_stats_service;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $players = Player::get();
        foreach ($players as $player) {
            $this->player_stats_service->player_stats_api($player);
        } 
    }
}