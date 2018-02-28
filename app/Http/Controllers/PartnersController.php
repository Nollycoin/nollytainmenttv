<?php

namespace App\Http\Controllers;

use App\Team;
use App\TeamMember;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnersController extends Controller
{
    public function findNewPartner(Request $request)
    {
        $this->validate($request, [
            'user_email' => 'required|email|exists:users,email'
        ], [
            'user_email.exists' => "$request->user_email doesn't exists for any user"
        ]);

        $pendingPartner = User::where('email', $request->user_email)->first();

        if (Auth::user()->team != null){
            $verify = TeamMember::where('user_id', $pendingPartner->id)
                ->where('team_id', Auth::user()->team->id)->count();
            if ($verify > 0){
                return redirect()->back()->withErrors([
                    'exists_on_team' => "User with email: $request->user_email already exists on your team"
                ]);
            }
        }

        return view('publisher.add_partner', [
            'userBasics' => $pendingPartner
        ]);
    }

    public function addPartner(Request $request){
        $this->validate($request, [
           'user_id' => 'required|exists:users,id',
            'share' => 'required|number'
        ]);
        $verify = TeamMember::where('team_id', Auth::id())->count();

        $team =  Team::where('user_id', Auth::id())->first();

        if($team == null){
            $team = new Team();
            $team->owner_id = Auth::id();

            $team->save();
        }else{

        }

        if ($verify > 0 && $verify < 5){
            $uid = $request->user_id;

            $teamMember = new TeamMember();

        }else{
            return redirect()->back()->withErrors([
                'team_full' => 'Your team already has maximum number of members'
            ]);
        }
    }
}
