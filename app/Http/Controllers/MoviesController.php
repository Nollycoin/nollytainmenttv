<?php

namespace App\Http\Controllers;

use App\MyList;
use App\Rating;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\List_;

class MoviesController extends Controller
{
    public function getMovieRating($id)
    {
        $rating = Rating::where('movie_id', $id)->avg('rating');

        if ($rating != null)
            return $rating;

        return 0.0;
    }

    public function updateMovieRating($movie_id, $rating)
    {
        if (Auth::check()) {
            $rating = Rating::where('movie_id', $movie_id)->where('user_id', Auth::id())->first();
            if ($rating != null) {
                $rating->update([
                    'rating' => $rating
                ]);
            } else {
                $rating = new Rating();

                $rating->save([
                    'user_id' => Auth::id(),
                    'rating' => $rating
                ]);
            }
        }
    }

    public function addMovieToList($id)
    {
        $list = MyList::where('movie_id', $id)->where('user_id', Auth::id())->first();

        if ($list != null) {
            $list->delete();
            return '<i class="ti-plus"></i> <span>Add List</span>';
        }else{
            $list = new MyList();

            $list->save([
               'user_id' => Auth::id(),
                'movie_id' => $id,
                'profile_id' => ' '
            ]);

            return '<i class="ti-check"></i>  <span>Added List</span>';
        }
    }
}
