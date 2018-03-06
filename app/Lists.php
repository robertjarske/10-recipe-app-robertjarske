<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{

    protected $fillable = [
        'title',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function recipe()
    {
        return $this->hasManyThrough(
            'App\Recipe', 
            'App\ListRecipe',
            'list_id',
            'id',
            'id',
            'recipe_id'
        );
    }
}
