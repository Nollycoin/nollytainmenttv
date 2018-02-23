<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyList extends Model
{
    protected $table = 'my_list';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function movie(){
        return $this->hasOne('App\Movie');
    }
}
