<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post;
use Illuminate\Http\Request;
use App\Models\User;






class PostController extends Controller
{

    public function post(Request $request){

       
        $post = Post::collection(\App\Models\Post::all());
        return response()->json([
            'success' => '200',
            'post' => $post
        ]);
    }
  

}