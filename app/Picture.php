<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function venues()
    {
        return $this->belongsToMany(Venue::class, 'venue_picture');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_picture');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_picture');
    }
}
