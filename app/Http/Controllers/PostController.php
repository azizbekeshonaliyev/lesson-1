<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();

        return view('posts',compact('posts'));
    }

    public function store(Request $request){
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
