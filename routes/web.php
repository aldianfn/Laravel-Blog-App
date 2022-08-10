<?php

use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'title' => 'Welcome!',
        'navActive' => 'home'
    ]);
});

Route::get('about', function () {
    return view('about', [
        'title' => 'About',
        'navActive' => 'about',
        'name' => 'Person 1',
        'email' => 'personeone@gmail.com',
        'img' => 'user.png'
    ]);
});

// Post routes
Route::get('post', [PostController::class, 'index']);
Route::get('post/{post:slug}', [PostController::class, 'getPost']); //Keyword Route Binding

// Category routes
Route::get('categories', [CategoryController::class, 'index']);

// Login
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');    //Keyword Middleware
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout']);

// Register
Route::get('register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store']);

// Dashboard
Route::get('dashboard', function () {
    return view('dashboard.index');
})->middleware('auth'); //Keyword Middleware

// CRUD Post
Route::get('dashboard/post/create-slug', [DashboardPostController::class, 'createSlug'])->middleware('auth');
Route::resource('dashboard/post', DashboardPostController::class)->middleware('auth');   //Keyword Resource Controller

// CRUD Category
Route::get('dashboard/categories/create-slug', [AdminCategoryController::class, 'createSlug'])->middleware('auth');
Route::resource('dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
