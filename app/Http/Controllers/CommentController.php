<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\Comment\CommentCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'video_id'=>'required'
        ]);

        $comments = Comment::where('video_id' , $data['video_id'])
        ->orderBy('id' , 'desc')
        ->get();
        return response($comments , 200);
    }
    public function t(Request $request)
    {
         $id = Auth::id();

         $data = $request->validate([
            'video_id'=>'required',
            'body'=>'required'
        ]);

        $comment = Comment::create([
            'body'=>$data['body'],
            'user_id'=> Auth::user()->id,
            'is_published'=> 1,
            'video_id'=>$data['video_id']
        ]);
        event(new CommentCreated($comment));
        return response($comment , 200);
    }
}
