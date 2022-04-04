<?php

namespace App\Http\Controllers\API;

use Response;
use App\Models\User;
use App\Models\Image;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(6);

        return PostResource::collection($posts);
    }

    //Post veiw counter
    public function view($id)
    {
        Post::find($id)->increment('view_count');
        return Post::with(['user', 'likes', 'comments'])->find($id);
    }

    //Show Method display details about a particuler posts
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

            //$new_post = $user->post()->find($id);

            //Multiple Images
            $images = $request->file('image_path');

            if($request->hasfile('image_path'))
            {
                foreach($images as $image){
                    $response =  $image->storeOnCloudinary('post_images');
                    $responseImageUrl = $response->getSecurePath();
                    $post->image_path=$responseImageUrl;
                    Image::create([
                        'post_id' => $post->id,
                        'image' => $responseImageUrl
                    ]);
                }
        
            }else{

                $post->image_path='';
            }

            //Upload image file to post object
            // $image = $request->file('image_path');

            // if($request->hasfile('image_path'))
            // {
            //     $response =  $image->storeOnCloudinary('post_images');
            //     $responseImageUrl = $response->getSecurePath();
            //     $post->image_path=$responseImageUrl;
            // }else{

            //     $post->image_path='';
            // }

            //Upload video file to post object
            $video = $request->file('video_path');

            if($request->hasfile('video_path'))
            {
                $compressedVideo = $video->storeOnCloudinary('post_video');
                $responseVideoUrl = $compressedVideo->getSecurePath();
                $post->video_path = $responseVideoUrl;

            }else{
                
                $post->video_path='';
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

    public function images($id){
        $post = Post::find($id);
        if(!$post) abort(404);
        $images = $post->images;
        return response()->json([
            'success' => true,
            'post' => $post,
            'post_image' => $images
        ]);
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
        
        $post = new Post;
        $post->description = $request->description;

        //Upload image file to post 
        $image = $request->file('image_path');

        if($request->hasfile('image_path'))
        {
            $response =  $image->storeOnCloudinary('post_images');
            $responseImageUrl = $response->getSecurePath();
            $post->image_path=$responseImageUrl;
        }else{

            $post->image_path='';
        }

         //Upload video file to post object
         $video = $request->file('video_path');

         if($request->hasfile('video_path'))
         {
             $compressedVideo = $video->storeOnCloudinary('post_video');
             $responseVideoUrl = $compressedVideo->getSecurePath();
             $post->video_path = $responseVideoUrl;

         }else{
             
             $post->video_path='';
         }

        
        $updated = $request->user()->$post->update();

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
