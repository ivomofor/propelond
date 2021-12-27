<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    protected $user;
    
    public function __construct()
    {
       $this->middleware('auth:api', ['except' => ['login','register']]);
       $this->user = new User;
    }
    

    public function register(Request $request)
    {
        $this->validate($request,
        [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'about' => ['required','string', 'max:255'],
            'phone_number' => ['required','digits:9|unique:users,phonenumber'],
            'gender' => ['required','string', 'max:255'],
            'dob' => ['required','string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

        $registerComplete = $this->user::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'about'=>$request->about,
            'phone_number' => $request->phone_number,
            'gender'=>$request->gender,
            'dob'=>$request->dob,
            'password'=> Hash::make($request->password),
        ]);

        if($registerComplete)
        {
            // Mail::to($request->email)->send(new WelcomeMail($this->user));
            return $this->login($request);
        }   

    }

    public function login(Request $request)
    {
        $this->validate($request,
        [
            'email'=>'required|email',
            'password'=>'required|string|min:6',
        ]);

        $jwt_token = null;

        $input = $request->only("email","password");

        if(!$jwt_token = auth()->attempt($input))
        {
            return response()->json([
                'success'=>false,
                'message'=>'invalid email or password'
            ], 400);

        }

        return response()->json([
            'success'=>true,
            'user' =>$this->me()->original,
            'token'=>$jwt_token,
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);

    }


}
