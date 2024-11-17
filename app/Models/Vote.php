<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        "election_user_id",
        "candidate_id",
    ];

    public function electionuser(){
        return $this->belongsTo(ElectionUser::class);
    }

    public function candidate(){
        return $this->belongsTo(Candidate::class);
    }
}
