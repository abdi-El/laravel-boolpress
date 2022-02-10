<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(2);
        return response()->json($posts);
    }

    public function show($id){
        $post = Post::find($id)->with(['tags'])->first(); // prende anche i tag assiociati così da poterli usare 
        return response()->json($post);
    }
}
