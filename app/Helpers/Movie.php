<?php
namespace App\Helpers;


use App\MyList;
use Illuminate\Support\Facades\Auth;

class Movie
{
    public static function canWatch($freeToWatch){
        if ($freeToWatch){
            return true;
        }
        if(Auth::check()){
            if (Auth::user()->is_subscriber == 1 || Auth::user()->is_admin == 1){
                return true;
            }
        }

        return false;
    }


    public static function createAddToListButton($movie_id, $color = 'white'){
        if (UserSubscription::isUserSubscribed()){
            $url = '#';
            $onclick = "addToList('$movie_id'); return false;";
        }else{
            $url = url('/').'register';
            $onclick = '';
        }

        if($color == 'white') {
            $class = 'btn-neutral';
        } elseif($color == 'red') {
            $class = 'btn-danger btn-fill';
        } elseif($color == 'green') {
            $class = 'btn-success btn-fill';
        }

        $check =  MyList::where('movie_id', $movie_id)->where('user_id', Auth::id())->count();
        if($check > 0) {
            return '<a href="'.$url.'" class="btn '.$class.' add-list" onclick="'.$onclick.'">
			<i class="ti-check"></i> 
			<span>Added List </span> 
			</a>';
        } else {
            return '<a href="'.$url.'" class="btn '.$class.' add-list" onclick="'.$onclick.'">
			<i class="ti-plus"></i> 
			<span>Add List</span>
			</a>';
        }
    }

}