@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route('admin.posts.index')}}" class="btn btn-primary my-2"> <-- ritorna alla lista dei post</a>
            <h4 class="m-0">Quì sono presenti tutti i post di categoria "{{$category->name}}":</h4>
            <table class='table table-bordered'>
                <tbody>
                    <thead>
                        <tr>
                            <th>Autore</th>
                            <th>titolo</th>
                        </tr>
                    </thead>
                    @foreach($category->posts as $post)
                    <tbody>
                        <tr>
                            <td>{{$post->author}}</td>
                            <td>{{$post->post_title}}</td>
                            <td><a href="{{route('admin.posts.show', $post['id'])}}" class="btn btn-success">leggi</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection