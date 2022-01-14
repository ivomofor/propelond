<?php

namespace App\Http\Controllers\API;

use Response;
use JWTAuth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index(){
    
        return PostResource::collection(Post::all());
       
    }

    public function show($id)
    {
        $post = $this->user->post()->find($id);
    
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, post with id ' . $id . ' cannot be found'
            ], 400);
        }
    
        return $post;
    }

    public function create(Request $request)
    {
            $this->validate($request, [
                'description' => 'required|max:255|unique:posts'                   
            ]);

            $post = new Post;
            $post->description = $request->description;

            if($request->file('image_path')==NULL){
                $post->image_path='placeholder.png';
            }else{
                $filename=Str::random(20) . '.' . $request->file('image_path')->getClientOriginalExtension();
                $post->image_path=$filename;
                $request->image_path->move(public_path('images'),$filename);
            }
            
            if ($this->user->post()->save($post))
            return response()->json([
                'success' => true,
                'message' => 'post successfully created',
                'post' => $post,
                'user_id' => $request->user()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, post could not be added'
            ], 500);
    }

    public function update(Request $request, $id)
    {
        $post = $this->user->post()->find($id);
    
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, post with id ' . $id . ' cannot be found'
            ], 400);
        }
    
        $updated = $post->fill($request->all())
            ->save();
    
        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'post successful updated',
                'post' => $post,
                'user_id' => $request->user()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, post could not be updated'
            ], 500);
        }
    }


    public function destroy($id)
    {
        $post = $this->user->post()->find($id);
    
        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, post with id ' . $id . ' cannot be found'
            ], 400);
        }
    
        if ($post->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'post with id ' . $id . ' successful deleted'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'post with id ' . $id . ' could not be deleted'
            ], 500);
        }
    }

}