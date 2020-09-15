<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'category_id', 'thumbnail', 'slug'
    ];

    public function getTakeImageAttribute(){
        return "/storage/".$this->thumbnail;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
