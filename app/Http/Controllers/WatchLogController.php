<?php

namespace App\Http\Controllers;

use App\Movie;
use App\WatchLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchLogController extends Controller
{
    public function logWatch(Request $request, $id){
        $video = Movie::findOrFail($id);
        $user_id = Auth::id();

        $log = WatchLog::where('user_id', $user_id)->where('movie_id', $id)->first();

        if($log != null){
            $log->times_watched += 1;
            $log->update();
        }else{
            $log = new WatchLog();
            $log->user_id = $user_id;
            $log->movie_id = $id;
            $log->times_watched = 1;

            $log->save();
         }

    }
}
