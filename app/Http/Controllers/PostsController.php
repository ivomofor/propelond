<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|max:255|unique:posts',
            'image_path' => 'required|mimes:jpg,png,jpeg|max:5048'       
        ]);

        $newImageName = uniqid(). '-' . '.' . 
        $request->image_path->extension();
        $request->image_path->move(public_path('images'), $newImageName);
           
         Post::create([
             'description' => $request->input('description'),
             'image_path' => $newImageName,
             'user_id' => auth()->user()->id

         ]);

         return redirect(route('post.index'))->with(['message' => 'Post Successfully Created']);
          

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('post.show')->with('post',$post);
        
    }

    /**
     * Show the form for editing the specified resource.//
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $newImageName = uniqid(). '-' . '.' . 
        $request->image_path->extension();
        $request->image_path->move(public_path('images'), $newImageName);
           
         Post::where('id', $id)->update([
             'description' => $request->input('description'),
             'image_path' => $newImageName,
             'user_id' => auth()->user()->id

         ]);

         return redirect(route('post.index'))->with(['message' => 'Post Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect(route('post.index'))->with(['message' => 'Post Successfully Deleted']);
    }

}
