<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id' , 'profile_name', 'profile_avatar'
    ];
}
