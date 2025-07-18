<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Traits\AuthorizesTeamAccess;
use App\Models\Team;
use App\Mail\InviteToTeam;
use App\Models\TeamInvite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    //use AuthorizesTeamAccess;
     public function invite(Request $request, Team $team)
    {
        //$this->authorizeTeamAccess($team);

        $request->validate([
            'email' => 'required|email'
        ]);

        // generating and storing invites
        $token = Str::uuid();
        $invite = TeamInvite::create([
            'team_id'=> $team->id,
            'email' => $request->email,
            'token'=> $token
        ]);

        $link = route('teams.acceptInvite', ['token'=> $token]);

        Mail::to($request->email)->send(new InviteToTeam($team, $link));

        return back()->with('success', 'Invitation sent successfully.');
    }
}
