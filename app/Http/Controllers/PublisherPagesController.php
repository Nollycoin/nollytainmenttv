<?php

namespace App\Http\Controllers;

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
}
