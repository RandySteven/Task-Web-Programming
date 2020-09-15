<?php

namespace App\Http\Controllers;

use App\Category;
use App\File;
use App\Http\Requests\PostRequest;
use App\Mail\Newsletter;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function show(Post $post){
        $posts = Post::where('category_id',$post->category_id)->latest()->take(3);
        $category = Category::get();
        $files = File::all();
        $user = new User();
        return view('post.show', compact('post', 'posts', 'category', 'files', 'user'));
    }

    public function edit(Post $post){
        $categories = Category::get();
        return view('post.edit', compact('post', 'categories'));
    }

    public function index(){
        $post_counts = Post::count();
        $categories = Category::all();
        $posts = Post::latest()->paginate(9);
        return view('post.index', compact('posts', 'post_counts', 'categories'));
    }

    public function create(){
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function store(PostRequest $request){

        $attr = $request->all();
        $attr['thumbnail'] = request()->file('thumbnail') ? request()->file('thumbnail')->store('images/post') : null ;
        $attr['slug'] = \Str::slug(request('title'));
        $attr['category_id'] = request('category');
        auth()->user()->posts()->create($attr);
        session()->has('success', 'Create success');
        return redirect('/');
    }

    public function update(Request $request, Post $post){

        $this->authorize('update', $post);
        $attr = $request->all();
        if($request->thumbnail){
            \Storage::delete($post->thumbnail);
            $thumbnail = request()->file('thumbnail')->store('images/post');
        }else{
            $thumbnail = $post->thumbnail;
        }
        $attr['thumbnail'] = $thumbnail;
        $attr['category_id'] = request('category');
        $post->update($attr);
        return redirect('/');
    }

    public function destroy(Post $post){
        $this->authorize('delete', $post);
        $post->delete($post);
        \Storage::delete($post->thumbnail);
        return redirect('/');
    }

    public function mail(Request $request){
        Mail::to($request->user())->send(new Newsletter);
        return back();
    }
}
