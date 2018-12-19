<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //

    public function breakfasts()
    {
        return $this->belongsToMany('App\Breakfast')->withTimestamps();
    }

    public static function getForCheckboxes()
    {
        $ingredients = self::orderBy('name')->get();

        $ingredientsForCheckboxes = [];

        foreach ($ingredients as $ingredient) {
            $ingredientsForCheckboxes[$ingredient['id']] = $ingredient->name;
        }

        return $ingredientsForCheckboxes;
    }
}
