<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

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


Route::get('/', [PostController::class, 'index'])->name('home');


Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/register', [RegisterController::class, 'create']);


// route to get all posts which are associated with specific category
//Route::get('/categories/{category:slug}', function(Category $category){
//    return view('posts', [
//        'posts' =>  $category -> posts,
//        'currentCategory' => $category,
//        'categories' => Category::all()
//    ]);
//})->name('category');



//route to fetch all post by a author
//Route::get('/authors/{author:username}', function(User $author){
//    return view('posts.index', [
//        'posts' => $author -> posts,
//
//    ]);
//});

