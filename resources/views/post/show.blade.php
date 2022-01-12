@extends('layouts.app')

@section('content')
    <div class="container"> 
        <div class="">
          <span class="text-gray-500">
             By <span class="font-bold italic ">{{ $post->user->first_name }}</span>,
             Created on {{ date('JS M Y', strtotime($post->updated_at)) }}
          </span>
        </div>        
        <div class="">
            <p>{{ $post->description }}</p>
        </div>
        <div class="">
            <img src="{{ asset('images/' . $post->image_path) }}" />
        </div>
               
    </div>
@endsection