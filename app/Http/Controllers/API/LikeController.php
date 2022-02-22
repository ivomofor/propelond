<?php

namespace App\Http\Controllers\API;

use JWTAuth;
use App\Models\User;
Use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class LikeController extends Controller
{
    public function like_post(Request $request){

        $like = Like::where('post_id',$request->id)->where('user_id',$request->user()->id)->get();

        if(count($like)>0){

            $like[0]->delete();
            return response()->json([
                'success' => true,
                'message' => 'unliked'
            ]);
        }
        $like = new Like;
        $like->user_id = $request->user()->id;
        $like->post_id = $request->id;
        $like->save();

        return response()->json([
            'success' => true,
            'message' => 'liked',
            'like' => $like
        ]);
    }
}
