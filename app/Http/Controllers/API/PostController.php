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

        return PostResource::collection(Post::orderBy('id', 'DESC')->get());

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
                'description' => 'max:1024|unique:posts'
            ]);

            $post = new Post;
            $post->description = $request->description;

            if($request->file('image_path')==NULL){
                $post->image_path='placeholder.png';
            }else{
                $response = cloudinary()->upload($request->file('image_path')->getRealPath())->getSecurePath();
                $post->image_path=$response;
                
            }

            if ($this->user->post()->save($post)) {
                $responsePost = Post::with('user')->where('id', $post->id)->first();
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
            $responsePost = Post::with('user')->where('id', $post->id)->first();
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
