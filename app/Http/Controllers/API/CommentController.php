<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    public function index(){

        $comments = Comment::orderBy('id', 'DESC')->get();

        return CommentResource::collection($comments);
    }
        
    public function show(Request $request, $id){

        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, post with id ' . $id . ' cannot be found'
            ], 400);
        }

        return $comment;
    }

    public function create($post_id, Request $request ){
        $post=Post::where('id', $post_id)->first();

        if($post){
            
            $validator = Validator::make($request->all(), [
            'content' => 'd|max:250',
            ]);

            if($validator->fails()) {

                return response()->json([
                    'message' => 'Validation errors',
                    'errors' => $validator->messages()
                ],422);
            }

            $comment = Comment::create([
                'content' =>$request->content,
                'post_id' =>$post->id,
                'user_id' =>$request->user()->id
           ]);

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

    public function update($post_id, Request $request){
        $post=Post::where('id', $post_id)->first();

        $comment = Comment::find($request->id);

        if(!$comment){
            return response()->json([
                'success' => false,
                'message' => 'Unauthorize access'
            ]);
        }
            $comment = Comment::create([
                'content' =>$request->content,
                'post_id' =>$post->id,
                'user_id' =>$request->user()->id
           ]);
        $comment->update();

        return response()->json([
            'success' => true,
            'message' => 'Comment edited'
        ]);
    }

    public function delete(Request $request, $id){
        $comment = Comment::find($id);
        //check if user is editing his own comment
        if(!$comment){
            return response()->json([
                'success' => false,
                'message' => 'Unauthorize access'
            ]);
        }
        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment deleted'
        ]);
    }

}
