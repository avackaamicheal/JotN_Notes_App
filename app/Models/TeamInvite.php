<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamInvite extends Model
{
    protected $fillable = ['team_id', 'email', 'token'];

    public function team()
    {
        $this->belongsTo(Team::class);
    }
}
