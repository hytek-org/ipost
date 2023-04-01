<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    //
    public function store(Post $post)
{
    $this->validate(request(), [
        'body' => 'required|min:3',
    ]);

    $comment = new Comment;
    $comment->body = request('body');
    $comment->user_id = Auth::user()->id;
    $comment->post()->associate($post);

    if (request('parent_id')) {
        $comment->parent_id = request('parent_id');
    }

    $comment->save();

    return back()->with('success', 'Your comment has been posted!');
}
}
