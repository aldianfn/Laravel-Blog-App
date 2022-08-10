<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'title' => 'Categories',
            'navActive' => 'categories',
            'categories' => Category::all()
        ]);
    }

    public function getCategory(Category $category)
    {
        return view('post', [
            'title' => $category->name,
            'navActive' => 'categories',
            'post' => $category->post->load('category', 'author'),  //Keyword Lazy Eager Loading
            // 'category' => $category->name
        ]);
    }
}
