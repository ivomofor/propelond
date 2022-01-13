@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{url('post/')}}" method="POST" enctype="multipart/form-data"> 
            @csrf      
            <div class="input-group">
                <textarea name="description" cols="40" rows="3" placeholder="What's on your mind,?">
                </textarea>
            </div>
            <div class="input-group">
                <input type="file" name="image_path" class="hidden">
            </div>
            
            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>
@endsection