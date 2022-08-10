<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    private static $posts = [
        [
            'author' => 'Author 1',
            'title' => 'Title 1',
            'slug' => 'title-1',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit excepturi sed expedita deserunt neque quas inventore nulla at cumque cupiditate.'
        ],
        [
            'author' => 'Author 2',
            'title' => 'Title 2',
            'slug' => 'title-2',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit excepturi sed expedita deserunt neque quas inventore nulla at cumque cupiditate.'
        ]
    ];

    public static function allPosts()
    {
        return collect(self::$posts);
    }

    public static function findPost($slug)
    {
        $post =  static::allPosts();

        return $post->firstWhere('slug', $slug);
    }
}
