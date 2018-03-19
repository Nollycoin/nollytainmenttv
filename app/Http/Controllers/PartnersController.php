<?php

namespace App\Http\Controllers;

use App\Mail\PartnerAdded;
use App\Movie;
use App\Team;
use App\TeamMember;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PartnersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function findNewPartner(Request $request)
    {
        $this->validate($request, [
            'user_email' => 'required|email|exists:users,email'
        ], [
            'user_email.exists' => "$request->user_email doesn't exists for any user"
        ]);

        $pendingPartner = User::where('email', $request->user_email)->where('email', '!=', Auth::user()->email)->first();

        if ($pendingPartner == null) {
            return redirect()->to(route('_add_partner'))->withErrors([
                'The email address you provided belongs to you'
            ]);
        }

        $publisher_movies = Movie::where('user_id', Auth::id())->get();

        if ($publisher_movies != null) {
            $templateMovie = $publisher_movies[0];
            $team = Team::where('owner_id', Auth::id())->where('movie_id', $templateMovie->id)->first();

            if ($team != null) {
                $percentageSum = TeamMember::where('team_id', $team->id)->sum('share');
            } else {
                $percentageSum = 0;
            }

            $templateMovie->remainingShare = 100 - $percentageSum;
        };

        return view('publisher.add_partner', [
            'userBasics' => $pendingPartner,
            'movies' => $publisher_movies,
            'templateMovie' => isset($templateMovie) ? $templateMovie : null
        ]);
    }

    public function addPartner(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'share' => 'required',
            'wallet' => 'required|string',
            'video' => 'required'
        ]);

        $user = User::findOrFail($request->get('user_id'));

        $team = Team::where('owner_id', Auth::id())->where('movie_id', $request->get('video'))->first();

        if ($team == null) {
            $team = new Team();
            $team->owner_id = Auth::id();
            $team->movie_id = $request->get('video');
            $team->save();
        }

        $verify = TeamMember::where('team_id', $team->id)->count();

        if ($verify < 0 || $verify >= 5) {
            return redirect()->back()->withErrors([
                'error' => 'Your team already has maximum number of members'
            ]);
        }

        $verify = TeamMember::where('team_id', $team->id)->where('user_id', $request->get('user_id'))->count();
        if ($verify) {
            return redirect()->back()->withErrors([
                'error' => 'This user already exists on the team with this movie'
            ]);
        }
        $shareSum = TeamMember::where('team_id', $team->id)->sum('share');
        if (($shareSum + $request->get('share')) > 100) {
            return redirect()->back()->withErrors([
                'error' => 'Total sum can not be greater than 100. You already have ' . $shareSum . '% allocated already'
            ]);
        }

        $teamMember = new TeamMember();
        $teamMember->user_id = $request->get('user_id');
        $teamMember->share = $request->get('share');
        $teamMember->wallet_address = $request->get('wallet');
        $teamMember->team_id = $team->id;
        $teamMember->save();

        Mail::to($user)->send(new PartnerAdded(Auth::user(),
            $user, $request->get('share'),
            $request->get('wallet')));

        return redirect()->back()->with('success', 'Team Member was added successfully');
    }

    public function deletePartner($id)
    {

        //TODO::PUT SOME RESTRICTION HERE
        $team_members = TeamMember::where('user_id', $id);

        if ($team_members != null) {
            try {
                $team_members->delete();
            } catch (\Exception $e) {
                return 'false';
            }
        }
        return 'true';
    }

    public function getUnallocatedPercentageByMovie($id)
    {
        $movie = Movie::findOrFail($id);
        $unallocatedPercentage = 100;

        $team = Team::where('owner_id', Auth::id())->where('movie_id', $id)->first();
        if ($team != null) {
            $unallocatedPercentage -= TeamMember::where('team_id', $team->id)->sum('share');
        }
        return json_encode([
            'unallocatedPercentage' => $unallocatedPercentage,
            'movieName' => $movie->movie_name
        ]);
    }
}
