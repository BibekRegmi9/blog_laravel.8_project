<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('register.create');
    }

    public function store(){
        //create the user
        $attributes = request()->validate([
            'name' => 'required|max:255|min:3',
            'username' => 'required|max:255|min:5',
            'email' => 'required|email|max:255',
            'password' => ['required', 'min:8', 'max:255']
        ]);

//        $attributes['password'] = bcrypt($attributes['password']); //encrypt password from here or from the user model
        User::create($attributes);
        return redirect('/');
    }
}
