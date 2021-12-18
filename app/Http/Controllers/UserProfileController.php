<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function userProfile()
    {
        $users = User::all();
        return view('user_profile')
               ->with('users', $users);
    }



    public function editUserProfile(Request $request, User $user)
    {   
        return view('edit-profile')
        ->with('user', $user);
    }

    public function updateUSerProfile(Request $request, $id)
    {
        // $this->validate($request,
        // [
        //     'first_name' => ['required', 'string', 'max:255'],
        //     'last_name' => ['required','string', 'max:255'],
        //     'gender' => ['required','string', 'max:255'],
        //     'dob' => ['required','string'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        // ]);


        // $user = auth()->user();
        // $user = User::findOrFail($user);
        // $user->first_name = $request->first_name;
        // $user->last_name = $request->last_name;
        // $user->phone_number = $request->phone_number;  
        // $user->gender = $request->gender;
        // $user->dob = $request->dob;
        // $user->save();

        User::where('id', $id)->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'phone_number' => $request->input('phone_number'),
            'about' => $request->input('about'),
        ]);
    }

    public function updateAvatar(Request $request)
    {
        $this->validate($request,
        [
            'image' => 'required|image|mimes:jpeg,jpg,png',
        ]); 
        
        $user = User::findOrFail(auth()->user()->id);
        $path = $request->file('image')->store('public/user_profile_images');
        $exploded_string = explode("public",$path);
        $user->avatar = asset("storage".$exploded_string[1]);
        $user->save();
        //dd($exploded_string);


        return response()->json([
            "success" => true,
            "message" => "Profile Image Updated successfully", 
            "category" => $user,
        ],200);
    }
    
}
