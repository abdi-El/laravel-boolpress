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
            <form action='{{route('admin.posts.update' , $post['id'])}}' method='POST' enctype='multipart/form-data'>
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
                  @error('category_id') <strong class="text-danger">{{$message}}</strong> @enderror
                  <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $cat)
                      <option value="{{$cat->id}}" @if($cat->id == old('category_id', $post->category_id)) selected @endif>{{$cat->name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <h6>Tags:</h6>
                  @foreach ($tags as $tag)
                  <input name="tags[]" id="tag-{{$loop->iteration}}" type="checkbox" value={{$tag['id']}}
                  @if ($errors->any() && in_array($tag->id,old('tags'))) checked @elseif(!$errors->any() && $post->tags->contains($tag->id)) checked @endif>
                  <label for="tag-{{$loop->iteration}}" class="mr-3">{{$tag->name}}</label>
                  @endforeach
                </div>

                {{-- Cover --}}
                <div class="form-group">
                  <label for="cover">Post content</label>
                  @error('cover') <strong class="text-danger">{{$message}} </strong>@enderror {{-- @error permette di inserire direttamente l'errore sopra il campo--}}
                 <input type="file" id="cover" name="cover"> {{-- old() permette di mostrare gli input chw sono stati messi --}}
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