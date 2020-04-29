<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{

    public function index()
    {
        $playlist = Playlist::where('user_id' , Auth::id())
        ->orderBy('name' , 'desc')->get();
        return response()->json($playlist , 200);
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'name'=>'required',
            'is_private'=>'required'
        ]);

        $playlist = Playlist::create([
            'name'=>$request->name,
            'is_private'=>$request->is_private,
            'user_id'=>Auth::id(),
        ]);
        return response()->json($playlist , 200);
    }




}
