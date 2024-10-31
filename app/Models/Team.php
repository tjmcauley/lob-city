<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    
    public function city() {
        return $this->belongsTo(City::class);
    }

    public function venue() {
        return $this->hasOne(Venue::class);
    }

    public function players() {
        return $this->hasMany(Player::class);
    }

    public function home_games() {
        return $this->hasMany(Game::class, 'home_team_id');
    }

    public function away_games() {
        return $this->hasMany(Game::class, 'away_team_id');
    }
}
