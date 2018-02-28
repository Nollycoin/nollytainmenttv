<?php

namespace App\Http\Controllers;

use App\Team;
use App\TeamMember;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $pendingPartner = User::where('email', $request->user_email)->first();

        if (Auth::user()->team != null) {
            $verify = TeamMember::where('user_id', $pendingPartner->id)
                ->where('team_id', Auth::user()->team->id)->count();
            if ($verify > 0) {
                return redirect(route('_add_partner'))->withErrors([
                    'exists_on_team' => "User with email: $request->user_email already exists on your team"
                ]);
            }
        }
        return view('publisher.add_partner', [
            'userBasics' => $pendingPartner
        ]);
    }

    public function addPartner(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'share' => 'required',
            'wallet' => 'required|string'
        ]);
        $verify = TeamMember::where('team_id', Auth::id())->count();

        $team = Team::where('owner_id', Auth::id())->first();

        if ($team == null) {
            $team = new Team();
            $team->owner_id = Auth::id();
            $team->save();
        }

        if ($verify < 0 || $verify >= 5) {
            return redirect()->back()->withErrors([
                'error' => 'Your team already has maximum number of members'
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
        $teamMember->wallet_address = $request->get('address');
        $teamMember->team_id = $team->id;
        $teamMember->save();

        return redirect()->back()->with('success', 'Team Member was added successfully');
    }
}
