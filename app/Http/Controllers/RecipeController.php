<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Promise;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;

class RecipeController extends Controller
{
    public function store(Request $request)
    {
        $recipes = $this->validate(request(), [
            'recipe' => 'required',
        ]);
    }
}
