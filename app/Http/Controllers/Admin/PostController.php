<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // permette di fare slug
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = Category::all();
        $posts = Post::all();
        if($posts){
            return view('admin.posts.index', compact('posts'));
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
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_title'=>'required|max:100',
            'author'=>'required|max:100',
            'content'=>'required',
        ]);

        $data = $request->all();
        $new_post = new Post();
        $data['slug'] = Str::slug($data['post_title'], '-');
        $new_post->fill($data);
        $new_post->save(); // da fare sempre dopo fill
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
        $categories = Category::all();
        $post = Post::find($id);
        if(! $post){
            abort(404);
        }
        else{
            return view('admin.posts.edit', compact('post', 'categories'));
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
        $request->validate([
            'post_title'=>'required|max:100',
            'author'=>'required|max:100',
            'content'=>'required',
        ]);

        $data = $request->all();
        $post = Post::find($id);
        $data['slug'] = Str::slug($data['post_title'], '-');
        $post->update($data);
        $post->save(); // da fare sempre dopo fill
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
}
