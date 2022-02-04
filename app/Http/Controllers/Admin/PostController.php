<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // permette di fare slug
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tags = Tag::all();
        $posts = Post::all();
        if($posts){
            return view('admin.posts.index', compact('posts', 'tags'));
        }
        else{
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->text(), $this->message());

        $data = $request->all();
        $new_post = new Post();
        $data['slug'] = Str::slug($data['post_title'], '-');
        $new_post->fill($data);
        $new_post->save(); // da fare sempre dopo fill
        $new_post->tags()->attach($data['tags']);
        return redirect()->route('admin.posts.index')->with('message', 'Created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if(! $post){
            abort(404);
        }
        else{
            return view('admin.posts.show', compact('post'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $post = Post::find($id);
        if(! $post){
            abort(404);
        }
        else{
            return view('admin.posts.edit', compact('post', 'categories', 'tags'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->text(), $this->message());

        $data = $request->all();
        $post = Post::find($id);
        $data['slug'] = Str::slug($data['post_title'], '-');
        $post->update($data);
        $post->save(); // da fare sempre dopo fill
        if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
        }
        else{
            $post->tags()->detach();
        }
        return redirect()->route('admin.posts.index')->with('message', 'Edit successfull!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', 'Delete successfull!!');   
    }
    private function text(){
        return ([
            'post_title'=>'required|max:100',
            'author'=>'required|max:100',
            'content'=>'required',
            'category_id'=>'nullable|exists:categories,id' // exists prende come valore la tabella e la colonna in cui devo cercare
        ]);
    }
    private function message(){
        return ([
            'required'=>'the :attribute is necessary',
            'max'=>'the max length is :max for :attribute',
            'category_id.exists'=>'the category does not exist',
        ]);
    }
}
