<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
