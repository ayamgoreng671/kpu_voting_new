<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        "photo",
        "name",
        "bio",
        "vision",
        "mission",
        "classroom_id",
        "election_id",
        "contract_candidateId"
    ];

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
}
