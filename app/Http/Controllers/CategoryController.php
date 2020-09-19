<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category){
        $posts = $category->posts()->latest()->paginate(9);
        $post_counts = $posts->count();
        $categories = Category::all();
        return view('post.index', compact('posts', 'post_counts', 'categories', 'category'));
    }

}
