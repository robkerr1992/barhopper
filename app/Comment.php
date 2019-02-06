<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function author()
    {
        $this->belongsTo(User::class, 'user_id');
    }

    public function venues()
    {
        $this->belongsToMany(Venue::class, 'venue_comment');
    }

    public function gameplans()
    {
        $this->belongsToMany(Gameplan::class, 'gameplan_comment');
    }
}
