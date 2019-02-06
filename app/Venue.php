<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    public function pictures()
    {
        return $this->belongsToMany(Picture::class, 'venue_picture');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'venue_feature');
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class, 'venue_comment');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'venue_id');
    }

    public function specials()
    {
        return $this->hasMany(Special::class, 'venue_id');
    }
}
