<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function getAuthor(User $author)
    {
        return view('post', [
            'title' => $author->name . "'s Post",
            'navActive' => 'post',
            'post' => $author->post->load('category', 'author') //Keyword Lazy Eager Loading
        ]);
    }
}
