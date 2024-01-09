<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

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
        if (auth() -> guest()){
            abort(Response::HTTP_FORBIDDEN);
        }
        return view('posts.create');
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
