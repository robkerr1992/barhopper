<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function venue()
    {
        $this->belongsTo(Venue::class, 'venue_id');
    }

    public function pictures()
    {
        $this->belongsToMany(Picture::class, 'event_picture');
    }

    public function gameplans()
    {
        $this->belongsToMany(Gameplan::class, 'gameplan_event');
    }
}
