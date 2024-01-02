<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\models\Category;

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


Route::get('/', function(){
    return view('posts', [
//        'posts' => Post::all()

        // eager loading
        'posts' => Post::latest()->with('category', 'author')->get()
    ]);
});

Route::get('/posts/{post:slug}', function(Post $post){
    return view('post', [
        'post' => $post
    ]);
});

// route to get all posts which are associated with specific category
Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts', [
        'posts' =>  $category -> posts->load(['category', 'author'])
    ]);
});


//route to fetch all post by a author
Route::get('/authors/{author:username}', function(User $author){
    return view('post', [
        'posts' => $author -> posts->load(['category', 'author'])
    ]);
});
