<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorRelation extends Model
{
    public function actor(){
       return $this->belongsTo('App\Actor');
    }

    public function movie(){
        return $this->belongsTo('App\Movie', 'movie_id');
    }
}
