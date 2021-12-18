@extends('layouts.app')

@section('content')
    <div class="container"> 
        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="card p-4">
                <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                    {{-- <button class="btn btn-secondary"> --}}
                   

                    <div class="upper"> <img src="{{asset('userImages/' . $user->avatar) }}" class="img-fluid"> </div>

                    <img src="{{asset('userImages/' . $user->cover_photo)}}" height="100" width="100" /></button>
    

                     <span class="name mt-3"> {{$user->first_name}} {{$user->last_name}}  </span> 
                     <span class="idd"> {{$user->email}}   </span>
                    <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1">Gender: {{$user->gender}} </span> <span><i class="fa fa-copy"></i></span> </div>
                    <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1">Phone Number: {{$user->phone_number}} </span> 678678678  <span><i class="fa fa-copy"></i></span> </div>
    
                    <button class="btn btn-primary btn-sm follow">Follow</button>
                    <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span class="number">1069 <span class="follow">Followers</span></span> </div>
                   
                   
                    <a href="{{ route('user.edit', $user->id) }}">
                        Edit Profile
                    </a>
    
    
                    <h3>Bio</h3>
                    <div class="text mt-3"> <span> {{$user->about}} </span> </div>
                    <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span> </div>
                    <div class=" px-2 rounded mt-4 date "> <span class="join">Joined {{$user->created_at}} </span> </div>
                               
                </div>
                <div class="row">
                    <div class="col">Posts</div>
                    <div class="col">Freinds</div>
                    <div class="col">About</div>
                    <div class="col">Photos</div>
                    <div class="col">Videos</div>
                    <div class="col">More</div>
                </div>
    
            </div>
            
        </div>
       
               
    </div>
@endsection