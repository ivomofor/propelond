<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($id)
    {
        $post_id = $id;
        $user_id = auth()->user()->id;
        $like = new like();
        $like->post_id = $post_id;
        $like->user_id = $user_id;
        $like->save();
        return back()->with(['message' => 'You Like This Post']);
    }

    public function dislike($id)
    {
        $post = Like::where('post_id',$id)->delete();
        return back()->with(['message' => 'You Unlike This Post']);

    }

}
