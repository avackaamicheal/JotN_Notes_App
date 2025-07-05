<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'content', 'note_id', 'user_id'];


    public function team(){

        return $this->belongsToMany(Team::class);
    }


    public function author(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function collaborators(){

        return $this->belongsToMany(User::class, 'note_collaborators')
                    ->withPivot('can_edit')
                    ->withTimestamps();

    }
}
