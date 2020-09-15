<?php

namespace App\Http\Controllers;

use App\Post;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user){
        $posts = Post::all();
        return view('user.user', compact('user', 'posts'));
    }
}
