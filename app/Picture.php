<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public function venues()
    {
        return $this->hasMany(Venue::class, 'picture_id');
    }
}
