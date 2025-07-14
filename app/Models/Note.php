<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['team_id', 'author_id', 'title', 'content'];


    public function team(){

        return $this->belongsTo(Team::class);
    }


    public function author(){

        return $this->belongsTo(User::class, 'author_id');
    }

    public function collaborators(){

        return $this->belongsToMany(User::class, 'note_collaborators')
                    ->withPivot('can_edit')
                    ->withTimestamps();

    }
}
