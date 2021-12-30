<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {  
        $users = User::all();
        return view('user.index')
               ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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

        return view('user.show')->with('user',$user);
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
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => ['required','string', 'max:255'],
            'about' => ['required','string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'avatar' => 'required|mimes:jpg,png,jpeg|max:5048',   
            // 'cover_photo' => 'required|mimes:jpg,png,jpeg|max:5048' 
        ]);

        $userAvatar = uniqid(). '-' . '.' . $request->avatar->extension();
        $request->avatar->move(public_path('userImages'), $userAvatar);

        // $userCoverPhoto = uniqid(). '-' . '.' . $request->cover_photo->extension();
        // $request->cover_photo->move(public_path('userImages'), $userCoverPhoto);


        User::where('id', $id)->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email'     => $request->input('email'),
            'about' => $request->input('about'),
            'avatar' => $userAvatar,
            // 'cover_photo' => $userCoverPhoto
        ]);


        return redirect(route('user.index'))->with(['message' => 'User Profile Successfully Updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
