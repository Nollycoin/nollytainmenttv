<?php
/**
 * Created by PhpStorm.
 * User: pens
 * Date: 2/20/18
 * Time: 4:21 PM
 */

namespace App\Helpers;


use Illuminate\Support\Facades\Auth;

class UserSubscription
{
    public static function isUserSubscribed(){
        if(Auth::check()){
            if (Auth::user()->is_subscriber == 1 || Auth::user()->is_admin == 1){
                return true;
            }
        }

        return false;
    }
}