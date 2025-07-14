<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    protected $table = 'teams';
    
    protected $fillable = ['name', 'description', 'created_by', 'invite_code'];


    public function owner(){

        return $this->belongsTo(User::class, 'created_by');
    }


    public function users(){

        return $this->belongsToMany(User::class)
                    ->withPivot('role')
                    ->withTimestamps();
    }

    public function notes(){

        return $this->hasMany(Note::class);
    }
}
