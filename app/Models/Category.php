<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function elections(){
        return $this->hasMany(Election::class);
    }
}
