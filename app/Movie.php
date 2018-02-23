<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function genre(){
        return $this->belongsTo('App\Genre');
    }

    public function actorRelations(){
        return $this->hasMany('App\ActorRelation');
    }

    public function seasons(){
        return $this->hasMany('App\Season');
    }
}
