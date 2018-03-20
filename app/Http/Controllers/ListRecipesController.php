<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListRecipes;

class ListRecipesController extends Controller
{

    public function index()
    {
        $listRecipes = ListRecipes::all();
        return $listRecipes;
    }

    public function store(Request $request)
    {
        $connection = $this->validate(request(), [
            'list_id' => 'required',
            'recipe_id' => 'required',
        ]);

        ListRecipes::create($connection);
        return response(200);
    }

    public function show($id)
    {
        $list = ListRecipes::all()->where('list_id', $id)->toArray();
        return $list;
    }

    public function destroy($listId, $recipeId) 
    {
        $id = ListRecipes::all()->where('list_id', $listId)->where('recipe_id', $recipeId)->toArray();
        $firstResponse = reset($id);
        $list = ListRecipes::find($firstResponse['id']);
        $list->delete();

        
        return response([
            'status' => 'success'
        ], 200);
    }
}
