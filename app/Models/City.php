<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function teams() {
        return $this->hasMany(Team::class);
    }
}
