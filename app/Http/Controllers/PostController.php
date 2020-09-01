<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post){
        return view('post.show', compact('post'));
    }

    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }

    public function index(){
        $posts = Post::latest()->paginate(9);
        return view('post.index', compact('posts'));
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:5|max:199',
            'body' => 'required|min:5',
            'thumbnail' => 'image|mimes:png,jpg,svg,jpeg|max:2048',
            'author' => 'required|min:3|max:20'
        ]);
        $attr = $request->all();
        $attr['thumbnail'] = request()->file('thumbnail') ? request()->file('thumbnail')->store('images/post') : null ;
        $attr['slug'] = \Str::slug(request('title'));
        Post::create($attr);
        return redirect('/');
    }
}
