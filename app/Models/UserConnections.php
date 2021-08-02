<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserConnections extends Model
{
    use HasFactory;

    public function user()
    {
        return User::where('id', $this->user1_id)->orWhere('id', $this->user2_id)->get();
    }
}
