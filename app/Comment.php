<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function author()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
