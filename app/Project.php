<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['title', 'description', 'manager_id'];

    public function manager(){
        return $this->belongsTo(User::class, 'manager_id');
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
