<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    
    public function team() {
        return $this->belongsTo(Team::class);
    }

    public function stats() {
        return $this->hasMany(Stat::class);
    } 
}
