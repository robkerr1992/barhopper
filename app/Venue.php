<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    public function pictures()
    {
        return $this->hasMany(Picture::class, 'venue_id');
    }

    public function venues()
    {
        return $this->hasMany(Feature::class, 'venue_id');
    }
}
