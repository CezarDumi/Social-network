<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function postReaction()
    {
        return $this->hasMany('App\Models\PostReaction');
    }

    public function postComment()
    {
        return $this->hasMany('App\Models\PostComment');
    }

    public function userConnections()
    {
        return UserConnections::where('user1_id', $this->id)->orWhere('user2_id', $this->id)->get();
    }

    public function userConnections1st()
    {
        $userIds1 = UserConnections::where('user1_id', $this->id)->pluck('user2_id');
        $userIds2 = UserConnections::where('user2_id', $this->id)->pluck('user1_id');
        return $userIds1->merge($userIds2);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reactions()
    {
        return $this->hasMany('App\Models\Reactions');
    }

    public function avatar()
    {

        return url("/avatars/$this->first_name-$this->id.jpg");
    }
}
