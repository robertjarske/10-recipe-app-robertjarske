<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    protected $fillable = [
      'recipe'  
    ];

    public function list()
    {
        return $this->hasManyThrough(
            'App\List', 
            'App\ListRecipe',
            'recipe_id',
            'recipe',
            'id',
            'list_id'
        );
    }
}
