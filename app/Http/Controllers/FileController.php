<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function store(Request $request){
        $attr = $request->all();
        $request->validate([
            'photo'=>'image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);
        $attr['photo'] = request()->file('photo') ? request()->file('photo')->store("images/photo") : null;

        $attr['post_id'] = request('post_id');
        File::create($attr);

        return back();
    }
}
