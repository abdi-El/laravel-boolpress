@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('admin.home')}}" class="btn btn-primary my-2"> <-- ritorna alla home</a>
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            <h5>L'utente {{Auth::user()->name}} può eseguire azione sui seguenti dati:</h5> 
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <strong>Author</strong>
                        </th>
                        <th>
                            <strong>Title</strong>
                        </th>
                        <th colspan="3">
                            actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->author}}</td>
                                <td>{{$post->post_title}}</td>
                                <td colspan='3' class='d-flex'>
                                    <a href="{{route('admin.posts.show', $post['id'])}}" class="btn btn-success">leggi</a>
                                    <a href="{{route('admin.posts.edit', $post['id'])}}" class="btn btn-warning mx-2">modifica</a>
                                    <form action="{{route('admin.posts.destroy', $post['id'])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">elimina</button> 
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    <h5>Non è ancora prensete nessun post: <a href="{{route('admin.posts.create')}}" class="btn btn-success">creane uno</a></h5>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection