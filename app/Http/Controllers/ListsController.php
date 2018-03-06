<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lists;
use App\User;
use Illuminate\Support\Facades\Auth;

class ListsController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find(Auth::user()->id);   
        $lists = Lists::all()->where('user_id', $user->id);
        
        return response([
            'status' => 'success',
            'data' => $lists
        ], 200);
    }

    public function store(Request $request)
    {
        $user = User::find(Auth::user()->id);
        
        $list = $this->validate(request(), [
            'title' => 'required'
        ]);

        $list['user_id'] = $user->id;

        Lists::create($list);
        return response(200);
                

    }

    public function show($id)
    {
        $list = Lists::findOrFail($id);
        return $list;
    }

    public function destroy($id)
    {
        $list = Lists::findOrFail($id);
        $list->delete();
        return response(200);
    }
}



