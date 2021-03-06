<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'subscription_expiration', 'is_subscriber', 'last_profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function session()
    {
        return $this->hasMany('App\Session');
    }

    public function myList(){
        return $this->hasMany('App\MyList');
    }

    public function team(){
        return $this->hasOne('App\Team', 'owner_id');
    }

    public function actors(){
        return $this->hasMany('App\Actor');
    }
}
