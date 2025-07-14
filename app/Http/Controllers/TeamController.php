<?php

namespace App\Http\Controllers;


use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $ownedTeams = $user->teams()->wherePivot('role', 'owner')->get();

        $joinedTeams = $user->teams()->wherePivot('role', 'member')->get();

        return view('teams.index', compact('ownedTeams', 'joinedTeams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
    ]);

        $team = Team::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by'=> Auth::id(),
            'invite_code'=> Str::slug($request->name). '-' . Str::random(8),
        ]);

        $team->users()->attach(Auth::id(), ['role' => 'Owner']);

         return redirect()->route('teams.index')->with('success', 'Team created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        $this->authorizeTeamAccess($team);

        $notes = $team->notes()->latest()->get();

        return view('teams.show', compact('teams', 'notes'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        $this->authorizeTeamAccess($team);

        return view('teams.edit', compact('teams'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $this->authorizeTeamAccess($team);

        $request->validate(['name' => 'required|string|max:255']);

        $team->update(['name'=> $request->name]);

        return redirect()-> route('teams.index')->with('success', 'Team updated Succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $this->authorizeTeamAccess($team);

        $team->delete();

        return redirect()->route('teams.index')->with('sucess', 'team deleted');
    }

     protected function authorizeTeamAccess(Team $team)
    {

    $role = $team->users()->where('user_id', Auth::id())->first()?->pivot->role;

    if ($role !== 'Owner') {
        abort(403, 'Only team owners can perform this action.');
    }


    }

     public function showJoinForm()
    {
        return view('teams.join');
    }

     public function join(Request $request)
    {
        $request->validate([
            'invite_code' => 'required|string|exists:teams,invite_code',
        ]);

        // This should return a team
        $team = Team::where('invite_code', $request->invite_code)->first();



        // Check if user is already a member
        if ($team->users()->where('user_id', Auth::id())->exists()) {
            return redirect()->route('teams.index')->with('info', 'You are already a member of this team.');
        }

        // Attach user as a member
        $team->users()->attach(Auth::id(), ['role' => 'Member']);

        // Redirect to team list or team page
        return redirect()->route('teams.index')->with('success', 'You’ve joined the team!');
    }
}
