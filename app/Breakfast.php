<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Breakfast extends Model
{
    //
    public function ingredients()
    {
        # withTimestamps will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\Ingredient')->withTimestamps();
    }
}
