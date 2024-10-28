<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    public function city() {
        return $this->belongsTo(City::class);
    }

    public function team() {
        return $this->belongsTo(Team::class);
    }
}
