<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pictures()
    {
        $this->belongsToMany(Picture::class, 'user_picture');
    }

    public function gameplans()
    {
        $this->belongsToMany(Gameplan::class, 'gameplan_user');
    }

    public function comments()
    {
        $this->hasMany(Comment::class, 'user_id');
    }
}
