<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $categories = Category::all();
        $users = User::all();
        $posts = Post::all();
        $category = Category::get();
        return view('dashboard', compact('categories', 'users', 'posts', 'category'));
    }
}
