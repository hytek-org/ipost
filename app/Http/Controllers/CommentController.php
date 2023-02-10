<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\ProfileMain;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
     }


    public function store(Request $request, $postId)
{  
    $user_id =auth()->user()->id;
    $comment = new Comment();
    $img_path1 = ProfileMain::where('user_id', $user_id)->first();
        $img_path = $img_path1->img_path;
    $comment->body = $request->body;
    $comment->user_id = auth()->user()->id;
    $comment->post_id = $postId;
   
    $comment->parent_id = $request->parent_id;
    $comment->img_path = $img_path;
    $comment->save();

    return back();
}
  
}
