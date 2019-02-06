<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gameplan extends Model
{
    public function author()
    {
        $this->belongsTo(User::class, 'user_id');
    }

    public function venues()
    {
        $this->belongsToMany(Venue::class, 'gameplan_venue');
    }

    public function events()
    {
        $this->belongsToMany(Event::class, 'gameplan_event');
    }

    public function attendees()
    {
        $this->belongsToMany(User::class, 'gameplan_user');
    }

    public function comments()
    {
        $this->belongsToMany(Comment::class, 'gameplan_comment');
    }

    public function plansInOrder()
    {
        //get venues
        //get events
        //order by position
        //return $plans;
    }
}
