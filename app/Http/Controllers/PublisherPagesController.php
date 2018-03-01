<?php

namespace App\Http\Controllers;

use App\Actor;
use App\ActorRelation;
use App\Genre;
use App\Movie;
use App\TeamMember;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublisherPagesController extends Controller
{
    public function index(){
        return view('publisher.dashboard', [

        ]);
    }

    public function partners()
    {
        $team = [];
        $teamMembers = TeamMember::where('team_id', Auth::user()->team->id)->get();

        if ($teamMembers != null){
            foreach ($teamMembers as $teamMember){
                $user = User::where('id', $teamMember->user_id)->first();
                $user->share = $teamMember->share;

                array_push($team, $user);
            }
        }
        return view('publisher.partners', [
           'users' => $team
        ]);
    }

    public function addPartner(){
        return view('publisher.add_partner');
    }

    public function addVideo()
    {
        $genres = Genre::all();
        $actors = Actor::all();
        $settings = Setting::where('id', 1)->first();


        return view('admin.add_video', [
            'genres' => $genres,
            'actors' => $actors,
            'settings' => $settings
        ]);
    }

    public function editVideo($id){

        $video = Movie::findOrFail($id);
        $genres = Genre::all();
        $actors = Actor::all();

        foreach ($actors as $actor){
            if (ActorRelation::where('movie_id', $id)->where('actor_id', $actor->id)->first() != null)
                $actor->is_in_cast = 1;
            else
                $actor->is_in_cast = 0;
        }

        return view('admin.edit_video', [
            'movie' => $video,
            'genres' => $genres,
            'settings' => Setting::find(1),
            'actors' => $actors
        ]);
    }
}
