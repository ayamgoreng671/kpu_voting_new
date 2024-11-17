<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectionUser extends Model
{
    protected $fillable = [
        "election_id",
        "user_id",
        "has_voted",
    ];


}
