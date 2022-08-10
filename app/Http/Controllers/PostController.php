<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = $author->name . "'s";
        }

        return view('post', [
            'title' => $title . ' Posts',
            'navActive' => 'post',
            'post' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function getPost(Post $post)
    {
        return view('single_post', [
            'title' => 'Post',
            'navActive' => 'post',
            'post' => $post
        ]);
    }
}
