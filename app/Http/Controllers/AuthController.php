<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;

class AuthController extends Controller
{
 
    protected $user;

    public function __construct() {
        $this->middleware('auth', ['except' => ['login', 'register']]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required','string', 'max:255'],
            'dob' => ['required','string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password'=> Hash::make($request->password)]));
        
        if ($user) {
            Mail::to($request->email)->send(new VerifyMail($this->user));

        }

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
        ], 201);

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth('api')->attempt($request->only(['email','password']))) {

            return response()->json([
                'error' => 'Unauthorized. Email and password do not match' ], 
            401);
        }

        return $this->createNewToken($token);

    }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }


    //Get the authenticated user
    public function me()
    {
        return response()->json(auth()->user()->only(['id','name','email','phone_number','avatar']));
    }
    
    //Logout the user(Invalidate the token)
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
