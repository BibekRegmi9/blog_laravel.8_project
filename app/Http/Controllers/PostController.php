<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){



        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)
        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post,
        ]);
    }


    public function create(){
        //implementing inside the middleware
//        if (auth() -> guest()){
//            abort(Response::HTTP_FORBIDDEN);
//        }

        return view('admin.posts.create');
    }

    public function store(){

//        $path = request()->file('thumbnail')->store('thumbnails');
//        dd($path);

        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }




//    public function getPosts(){
//
////        $posts = Post::latest();
////        if(\request('search')){
////            $posts->where('title', 'like', '%' . request('search') . '%')
////                ->orWhere('body',  'like', '%' . request('search') . '%');
////        }
////        return $posts ->get();
//
//        Post::latest()->filter()->get();
//    }
}
