<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Team $team, Note $note)
    {
         $this->authorizeAccess($team);

        $notes = $team->notes()->latest()->get();
        return view('notes.index', compact('team', 'notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Team $team)
    {
         $this->authorizeAccess($team);
        return view('notes.create', compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Team $team)
    {
        $this->authorizeAccess($team);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $team->notes()->create([
            'title' => $request->title,
            'content' => $request->content,
            'team_id' => $request->team_id,
            'author_id' => Auth::id(),
        ]);

        return redirect()->route('teams.notes.index', $team)->with('success', 'Note created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team, Note $note)
    {
        $this->authorizeAccess($team);

        $notes = $team->notes()->latest()->get();

        return view('notes.show', compact('team', 'note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team, Note $note)
    {
       $this->authorizeAccess($team);
        $this->authorizeNoteOwnership($note);

        return view('notes.edit', compact('team', 'note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team, Note $note)
    {
         $this->authorizeAccess($team);
        $this->authorizeNoteOwnership($note);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note->update($request->only('title', 'content'));

        return redirect()->route('teams.notes.index', $team)->with('success', 'Note updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team, Note $note)
    {
        $this->authorizeAccess($team);
        $this->authorizeNoteOwnership($note);

        $note->delete();

        return redirect()->route('teams.notes.index', $team)->with('success', 'Note deleted Successfully.');
    }

     protected function authorizeAccess(Team $team)
    {
        if (!$team->users->contains(Auth::id())) {
            abort(403, 'You are not a member of this team.');
        }
    }

    protected function authorizeNoteOwnership(Note $note)
    {
        if ($note->author_id !== Auth::id()) {
            abort(403, 'Only the author can edit/delete this note.');
        }
    }
}
