<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function postReaction()
    {
        return $this->hasMany('App\Models\PostReaction');
    }

    public function postComment()
    {
        return $this->hasMany('App\Models\PostComment');
    }
    
    public function postReactionCount($reactionId)
    {
        return $this->postReaction->where('reaction_id', $reactionId)->count();
    }

    public function postCommentCount()
    {
        return $this->postComment->count();
    }

    public function hasCurrentUserReacted($reactionId)
    {
        return $this->postReaction->where('reaction_id', $reactionId)->where('user_id', Auth::user()->id)->count() > 0;
    }
}
