<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function teams() {
        return $this->hasMany(Team::class);
    }

    public function venues() {
        return $this->hasMany(Venue::class);
    }
}
