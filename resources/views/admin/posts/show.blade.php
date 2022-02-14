@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('admin.posts.index')}}" class="btn btn-primary my-4"> <-- ritorna alla lista dei post</a>
            <h4 class="my-2">{{$post->post_title}}</h4>
            <span><strong>Categoria:</strong> {{$post->category->name}} <br></span>
            <span><strong>Autore: </strong>{{$post->author}} <br></span>
            <span><strong>Tags: </strong>
                @foreach ($post->tags as $tag)
                    <span class='badge badge-success'>{{$tag->name}}</span>    
                @endforeach
            <br></span>
            <h5 class="mt-3"> <strong>Contenuto:</strong></h5>
            <p class="border border-primary rounded p-1">{{$post->content}}</p>
        </div>
        @if($post->cover)
            <img  class='img-fluid' src="{{asset('storage/'.$post->cover)}}" alt="aaaa">
        @endif
    </div>
</div>
@endsection