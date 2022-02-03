@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h5>{{Auth::user()->name}} insersci i dati del nuovo post:</h5> 
            {{-- se ci sono errori nella validazione $errors->any() --}}
            @if ($errors->any()) 
              <div class="alert alert-danger">
                  <ul>
                    {{-- mostra gli errori --}}
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
            <form action='{{route('admin.posts.update' , $post['id'])}}' method='POST'>
                @method('PUT')
                @csrf 
                <div class="form-group">
                  <label for="author">Author:</label>
                  @error('author') <strong class="text-danger">{{$message}} </strong>@enderror
                  <input type="text" class="form-control" id="author" name="author" value="{{$post->author}}"> 
                </div>
                <div class="form-group">
                  <label for="title">Post title</label>
                  @error('post_title') <strong class="text-danger">{{$message}}</strong> @enderror
                  <input name="post_title" id="title" class="form-control" placeholder="Please enter your title here..." value='{{$post->post_title}}'></input>
                </div>
                <div class="form-group">
                    <label for="content">Post content</label>
                    @error('content') <strong class="text-danger">{{$message}} </strong>@enderror {{-- @error permette di inserire direttamente l'errore sopra il campo--}}
                    <textarea name="content" id="content" rows="6" class="form-control" placeholder="Please enter your title here...">{{old('content', $post->content)}}</textarea> {{-- old() permette di mostrare gli input che sono stati messi --}}
                </div>
                <div class="form-group">
                  <label for="category_id">Category</label>
                  @error('post_title') <strong class="text-danger">{{$message}}</strong> @enderror
                  <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $cat)
                      <option value="{{$cat->id}}" @if($cat->id == old('category_id', $post->category_id)) selected @endif>{{$cat->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <button class='btn btn-success form-control mt-3'>Salva modifiche</button>
                </div>
            </form>
            <a href='{{route('admin.posts.index')}}' class='btn btn-primary  mt-5'><-- Vai alla lista dei post</a>
        </div>
    </div>
</div>
@endsection