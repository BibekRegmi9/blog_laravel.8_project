<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    //
    public function index(){
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
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

        return redirect('/')->with('success', 'Post Added!');
    }

    public function edit(Post $post){
        return view('admin.posts.edit',[
            'post' => $post
        ]);
    }

    public function update(Post $post){
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        if(isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post -> update($attributes);
        return redirect('/admin/posts')->with('success', 'Post Updated!');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect('/admin/posts')->with('success', 'Post Deleted!');
    }
}
