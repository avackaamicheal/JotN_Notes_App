<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\Auth;

trait AuthorizesTeamAccess
{
    protected function authorizeTeamAccess($team)
    {
        $role = $team->users()->where('user_id', Auth::id())->first()?->pivot->role;
        if ($role !== 'owner') {
            abort(403, 'Only team owners can perform this action.');
        }
    }
}
