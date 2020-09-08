<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(){
        $query = request('query');
        $post_counts = Post::count();
        $posts = Post::where('title', 'LIKE', '%'.$query.'%')->latest()->paginate(9);
        return view('post.index', compact('posts', 'post_counts'));
    }
}
