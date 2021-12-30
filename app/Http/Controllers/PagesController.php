<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $users = User::all();
        
        // return view('post.index',compact('posts'));
        return view('post.index')->with('users', $users)
                                ->with('posts',$posts);


    }
}
