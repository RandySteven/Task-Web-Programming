<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'author', 'thumbnail', 'slug'
    ];

    public function getTakeImageAttribute(){
        return "/storage/".$this->thumbnail;
    }
}
