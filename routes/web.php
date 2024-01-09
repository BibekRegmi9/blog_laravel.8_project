<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Services\MailchimpNewsletter;


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

//Route::post('/newsletter', function(Newsletter $newsletter){
//    request()->validate(['email' => 'required|email']);
//
//
//    try{
//        $newsletter = new Newsletter();
//        $newsletter -> subscribe(request('email'));
//    }catch (\Exception $e){
//         throw \Illuminate\Validation\ValidationException::withMessages([
//            'email' => 'This email could not be added to the news letter'
//        ]);
//    }
//
//
//    return redirect('/') -> with('success', 'You are subscribed to our newsletter');
//});

Route::post('/newsletter', NewsletterController::class);

Route::get('/', [PostController::class, 'index'])->name('home');


Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('/admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('/admin/posts', [PostController::class, 'store'])->middleware('admin');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/sessions', [SessionController::class, 'store'])->middleware('guest');


Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');


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

