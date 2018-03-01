<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WatchLog extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function movie(){
        return $this->belongsTo('App\Movie');
    }
}
