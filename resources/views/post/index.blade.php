@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">

      @if (session()->has('message'))
          <div>
            <p class="">
              {{ session()->get('message') }}
            </p>
          </div>
        
      @endif

      @if (Auth::check())

        <div>
          <a href="{{ url('/post/create') }}"  class="btn btn-primary">
            Create Post
          </a>
        </div>
        
      @endif
        
         @foreach ($posts as $post)
         
            <div class="">
              <span class="text-gray-500">
                  <span class="font-bold italic ">{{ $post->user->first_name }}</span>,
                 Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
              </span>
            </div>        
            <div class="">
                <p>{{ $post->description }}</p>
            </div>
            <div class="">
              <img src="{{ asset('images/' . $post->image_path) }}" />
          </div>
            
          @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)

          <div>
            <a href="{{ route('post.edit', $post->id) }}">
              Edit
            </a>
            <form method="POST" action="{{ route('post.destroy', $post->id) }}">
              @csrf
              @method('DELETE')
        
                    <button type="submit">
                      Delete
                    </button>
              </form>
              
            </a>
          </div>
          
          @endif
         @endforeach
          

        
    </div>
</div>
@endsection

