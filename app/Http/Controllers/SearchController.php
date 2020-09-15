<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(){
        $query = request('query');
        $categories = Category::all();
        $posts = Post::where('title', 'LIKE', '%'.$query.'%')->latest()->paginate(9);
        $post_counts = $posts->count();
        return view('post.index', compact('posts', 'post_counts', 'categories'));
    }
}
