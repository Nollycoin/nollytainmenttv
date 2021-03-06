<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }
}
