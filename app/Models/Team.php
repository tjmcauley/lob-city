<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function city() {
        return $this->belongsTo(City::class);
    }

    public function venue() {
        return $this->hasOne(Venue::class);
    }

    public function players() {
        return $this->hasMany(Player::class);
    }
}
