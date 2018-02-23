<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = [
        'actor_name', 'actor_picture'
    ];

    public function actorRelations(){
        return $this->hasMany('App\ActorRelation');
    }
}
