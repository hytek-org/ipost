<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function like(Post $post)
{
    $like = $post->likes()->where('user_id', auth()->id())->first();

    if ($like) {
        if ($like->type == 0) {
            $like->delete();
        } else {
            $like->type = 0;
            $like->save();
        }
    } else {
        $post->likes()->create([
            'user_id' => auth()->id(),
            'type' => 0,
        ]);
    }

    return back();
}

public function dislike(Post $post)
{
    $like = $post->likes()->where('user_id', auth()->id())->first();

    if ($like) {
        if ($like->type == 1) {
            $like->delete();
        } else {
            $like->type = 1;
            $like->save();
        }
    } else {
        $post->likes()->create([
            'user_id' => auth()->id(),
            'type' => 1,
        ]);
    }

    return back();
}

}
