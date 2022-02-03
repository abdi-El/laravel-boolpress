@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('admin.posts.index')}}" class="btn btn-primary my-2"> <-- ritorna alla lista dei post</a>
            <h4 class="m-0">{{$post->post_title}}</h4>
            <span><strong>Category:</strong> {{$post->category->name}} <br></span>
            <span>made by {{$post->author}}</span>
            <h5 class="mt-3"> <strong>Content:</strong></h5>
            <p>{{$post->content}}</p>
        </div>
    </div>
</div>
@endsection