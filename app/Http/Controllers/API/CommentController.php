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
        
    public function show_comment(Request $request, $id){

        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, post with id ' . $id . ' cannot be found'
            ], 400);
        }
        $comment->load('user');
        return $comment;
    }

    public function post_comment($post_id, Request $request ){
        $post=Post::where('id', $post_id)->first();

        if($post){
            
            $validator = Validator::make($request->all(), [
            'content' => 'required|max:250',
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
           $comment->load('user');

           return response()->json([
               'message' => 'Comment successfuly created',
               'data' =>$comment
           ], 200);

        }else{
           return response()->json([
          'massage' => 'No comment found',
           ], 400);
       }
    }

    public function update_comment( Request $request, $id){

        $comment = Comment::find($id);

        if (!$comment) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, comment with id ' . $id . ' cannot be found'
            ], 400);
        }

        $updated = $comment->fill($request->all())->save();

        if ($updated) {
            $responseComment = Comment::with('user')->where('id', $comment->id)->first();
            return response()->json([
                'success' => true,
                'message' => 'comment successful updated',
                'comment' => $responseComment
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, comment could not be updated'
            ], 500);
        }
    }

    public function delete_comment(Request $request, $id){
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
