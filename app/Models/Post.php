<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user() {
        return $this->belongsTo(Profile::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
