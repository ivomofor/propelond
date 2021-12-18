@extends('layouts.app')

@section('content')

    <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h4 class="name-text text-center">Edit Profile</h4>

    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" >
    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" >

    <input type="email" name="email" value="{{ old('email', $user->email) }}" >

    <div class="mb-3">
        <label for="about" class="form-label">About</label>
        <textarea type="text" name="about" value="{{ old('about') }}" > {{$user->about}} </textarea>
    </div>
 
    <div class="col-md-3 border-right">
        <div>
            <img src="{{ asset('userImages/' . $user->avatar) }}" alt="{{$user->avatar}}" ><br>
            <input type="file" name="avatar" class="hidden">
            
        </div>

            @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
    </div> 

      {{-- <div class="col-md-3 border-right">
        <div>
            Cover Photo
            <img src="{{ asset('userImages/' . $user->cover_photo) }}" alt="{{$user->cover_photo}}" >  <br>
            <input type="file" name="cover_photo" class="hidden">
            
        </div>

            @error('cover_photo')
                <span class="invalid-feedback" role="alert"> 
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
    </div>  --}}
   
    <button type="submit" class="btn btn-primary px-5">
        Save
    </button>
    
    </form>

@endsection