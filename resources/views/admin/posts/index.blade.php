@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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