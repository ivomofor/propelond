<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 

    public function index()
    {  
        $users = User::all();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, post with id ' . $id . ' cannot be found'
            ], 400);
        }
        return $user;
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        
        $user = auth()->user();
        $user->about = $request->about;
        $user->phone_number = $request->phone_number; 
        $user->occupation = $request->occupation; 
        $user->hobbies = $request->hobbies; 
        $user->city = $request->city; 
        $user->country = $request->country; 

        $user->save();  

        return response()->json([
            "success" => true,
            "message" => "Profile updated successfully", 
            "user" => $user,
        ], 200);
    }

    public function updateAvatar(Request $request )
    {
        $user = User::findOrFail(auth()->user()->id);

        if($request->file('avatar')==NULL){
            $user->avatar='avatar_placeholder.png';
        }else{
            $filename=Str::random(20) . '.' . $request->file('avatar')->getClientOriginalExtension();
            $user->avatar=$filename;
            $request->avatar->move(public_path('images'),$filename);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            "success" => true,
            "message"  => "User Successfully deleted",
        ], 200);
    }
}
