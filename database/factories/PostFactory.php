<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'slug' => \Str::slug($faker->sentence()),
        'body' => $faker->paragraph(10),
        'author' => $faker->sentence(),
        'user_id' => 1,
        'thumbnail' => 'images/post/'.$faker->image('public/storage/images/post', 640, 480, null, false)
    ];
});
