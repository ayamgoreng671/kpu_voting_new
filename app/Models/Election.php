<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Election extends Model
{
    protected $fillable = [
        "name",
        "description",
        "start_datetime",
        "end_datetime",
        "category_id",
        "election_contract_address",
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function users():BelongsToMany{
        return $this->BelongsToMany(User::class, 'election_users')->withPivot('has_voted');
    }
}
