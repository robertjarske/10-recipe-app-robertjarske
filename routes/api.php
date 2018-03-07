<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function() {
    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');
    Route::post('register', 'AuthController@register');
    Route::get('user', 'AuthController@user');
    Route::get('refresh', 'AuthController@refresh');
    Route::post('recover', 'AuthController@recover');

});

Route::resource('recipe', 'RecipeController');

Route::resource('lists', 'ListsController');

Route::get('/listrecipes', 'ListRecipesController@index');
Route::get('/listrecipes/{id}', 'ListRecipesController@show');
Route::delete('/listrecipes/{listId}/{recipeId}', 'ListRecipesController@destroy');

Route::group(['middleware' => 'cors'], function() {
    Route::post('/save', 'ListRecipesController@store');
});