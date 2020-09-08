<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post){
        $posts = Post::all()->take(3);
        return view('post.show', compact('post', 'posts'));
    }

    public function edit(Post $post){
        return view('post.edit', compact('post'));
    }

    public function index(){
        $post_counts = Post::count();
        $posts = Post::latest()->paginate(9);
        return view('post.index', compact('posts', 'post_counts'));
    }

    public function create(){
        return view('post.create');
    }

    public function store(PostRequest $request){

        $attr = $request->all();
        $attr['thumbnail'] = request()->file('thumbnail') ? request()->file('thumbnail')->store('images/post') : null ;
        $attr['slug'] = \Str::slug(request('title'));
        Post::create($attr);
        auth()->user()->posts()->create($attr);
        session()->has('success', 'Create success');
        return redirect('/');
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'title' => 'required|min:5|max:199',
            'body' => 'required|min:5',
            'thumbnail' => 'image|mimes:png,jpg,svg,jpeg|max:2048',
            'author' => 'required|min:3|max:20'
        ]);
        $attr = $request->all();
        if($request->thumbnail){
            \Storage::delete($post->thumbnail);
            $thumbnail = request()->file('thumbnail')->store('images/post');
        }else{
            $thumbnail = $post->thumbnail;
        }
        $attr['thumbnail'] = $thumbnail;
        $attr['slug'] = \Str::slug(request('title'));
        $post->update($attr);
        return redirect('/');
    }

    public function destroy(Post $post){
        $post->delete($post);
        \Storage::delete($post->thumbnail);
        return redirect('/');
    }
}
