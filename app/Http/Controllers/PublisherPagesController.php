<?php

namespace App\Http\Controllers;

use App\Actor;
use App\ActorRelation;
use App\Genre;
use App\Movie;
use App\Setting;
use App\Team;
use App\TeamMember;
use App\User;
use Illuminate\Support\Facades\Auth;

class PublisherPagesController extends Controller
{
    public function index()
    {
        return view('publisher.dashboard', [

        ]);
    }

    public function partners()
    {
        $teamArray = [];


        try {
            $teams = Team::where('owner_id', Auth::id())->get();

            if ($teams) {
                foreach ($teams as $team) {
                    $teamMembers = TeamMember::where('team_id', $team->id)->get();

                    if ($teamMembers != null) {
                        foreach ($teamMembers as $teamMember) {
                            $user = User::where('id', $teamMember->user_id)->first();
                            $user->share = $teamMember->share;

                            $movie = Movie::where('id', $team->movie_id)->first();

                            if ($movie != null)
                                $user->share_movie = $movie->movie_name;
                            else
                                $user->share_movie = '';

                            array_push($teamArray, $user);
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            //handle Error here
        }

        return view('publisher.partners', [
            'users' => $teamArray
        ]);
    }

    public function addPartner()
    {
        return view('publisher.add_partner');
    }

    public function videos()
    {
        $videos = Movie::where('user_id', Auth::id())->paginate(20);
        return view('publisher.videos', ['movies' => $videos]);
    }

    public function addVideo()
    {
        $genres = Genre::all();
        $actors = Actor::where('user_id', Auth::id())->get();
        $settings = Setting::where('id', 1)->first();


        return view('publisher.add_video', [
            'genres' => $genres,
            'actors' => $actors,
            'settings' => $settings
        ]);
    }

    public function editVideo($id)
    {
        $video = Movie::findOrFail($id);
        $genres = Genre::all();
        $actors = Actor::where('user_id', Auth::id())->get();

        foreach ($actors as $actor) {
            if (ActorRelation::where('movie_id', $id)->where('actor_id', $actor->id)->first() != null)
                $actor->is_in_cast = 1;
            else
                $actor->is_in_cast = 0;
        }

        return view('publisher.edit_video', [
            'movie' => $video,
            'genres' => $genres,
            'settings' => Setting::find(1),
            'actors' => $actors
        ]);
    }

    public function actors()
    {
        $actors = Actor::where('user_id', Auth::id())->paginate(20);
        return view('publisher.actors', ['actors' => $actors]);
    }

    public function addActor()
    {
        return view('publisher.add_actor');
    }

    public function editActor($id)
    {
        $actor = Actor::findOrFail($id);
        return view('publisher.edit_actor', [
            'actor' => $actor
        ]);
    }
}