<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    public function venue()
    {
        $this->belongsTo(Venue::class, 'venue_id');
    }
}
