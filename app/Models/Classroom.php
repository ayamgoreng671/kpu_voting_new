<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function users(){
        return $this->hasMany(User::class);
    }
    public function candidates(){
        return $this->hasMany(Candidate::class);
    }
}
