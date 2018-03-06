<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListRecipes extends Model
{

    protected $fillable = [
        'list_id',
        'recipe_id'
    ];

    public function list()
    {
        return $this->belongsTo('App\List', 'list_id', 'id');
    }
    
    public function recipe()
    {
        return $this->belongsTo('App\Recipe', 'recipe_id', 'id');
    }
}
