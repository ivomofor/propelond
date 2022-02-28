<?php

namespace App\Http\Controllers\API;

use Response;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        $limit = 6;
        $posts = Post::orderBy('id', 'DESC')->limit($limit)->get();
        

        return PostResource::collection($posts);
    }

    public function show(Request $request, $id)
    {
        $user = $request->user();
        $post = $user->post()->find($id);

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
                'description' => 'max:1024|unique:posts'
            ]);

            $post = new Post;
            $post->description = $request->description;

            if($request->file('image_path')==NULL){
                $post->image_path='placeholder.png';
            }else{
                $response =  $request->file('image_path')->storeOnCloudinary('post_images');
                $responseurl = $response->getPath();
                $post->image_path=$responseurl;
            }

            if ($request->user()->post()->save($post)) {
                $responsePost = Post::with('user', 'likes', 'comments')->where('id', $post->id)->first();
                return response()->json([
                    'success' => true,
                    'message' => 'post successfully created',
                    'post' => $responsePost
                ]);
            }else
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, post could not be added'
                ], 500);
    }

    public function update(Request $request, $id)
    {
        $post = $request->user()->post()->find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, post with id ' . $id . ' cannot be found'
            ], 400);
        }

        $updated = $post->fill($request->all())
            ->save();

        if ($updated) {
            $responsePost = Post::with('user', 'likes', 'comments')->where('id', $post->id)->first();
            return response()->json([
                'success' => true,
                'message' => 'post successful updated',
                'post' => $responsePost
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, post could not be updated'
            ], 500);
        }
    }


    public function destroy(Request $request, $id)
    {
        $post = $request->user()->post()->find($id);

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
