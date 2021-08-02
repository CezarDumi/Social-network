<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reactions extends Model
{
    use HasFactory;

    public function postReaction()
    {
        return $this->belongsTo('App\Models\PostReaction');
    }
}
