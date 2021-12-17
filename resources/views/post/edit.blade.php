@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data"> 
            @csrf 
            @method('PUT') 

            <div class="input-group">
                <textarea name="description" cols="40" rows="3">
                    {{ $post->description }}
                </textarea>
            </div>
            <div>
                <img src="{{ asset('images/' . $post->image_path) }}" alt="{{$post->image_path}}" ><br>
                <input type="file" name="image_path" class="hidden">
                
            </div>
              <button type="submit" class="btn btn-primary">save</button>
        </form>
        
    </div>
@endsection