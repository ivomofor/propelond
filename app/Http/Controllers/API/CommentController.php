<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    public function create($post_id, Request $request ){
        $post=Post::where('id', $post_id)->first();

        if($post){
            $validator = Validator::make($request->all(), [
                'content' => 'd|max:250',
                'user_id' => 'required',
            ]);
            if($validator->fails()) {
                return response()->json([
                    'message' => 'Validation errors',
                    'errors' => $validator->messages()
                ],422);
            }

            $comment = Comment::create([
                'message' =>$request->maessage,
                'post_id' =>$post->id,
                'user_id' =>$request->user()->id
            ]);

            $comment->load('user');

            return response()->json([
                'message' => 'Comment successfuly created',
                'data' =>$comment
            ], 200);

        }else{
            return response()->json([
                'massage' => 'No post found',
            ], 400);
        }
    }
}
