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
            'username' => 'required|max:255|min:5|unique:users,username',  // unique-> validation added to check same username is present in db
            'email' => 'required|email|max:255|unique:users,email',   // unique-> validation added to check same username is present in db
            'password' => ['required', 'min:8', 'max:255']
        ]);

//        $attributes['password'] = bcrypt($attributes['password']); //encrypt password from here or from the user model
        User::create($attributes);
//        session()->flash('success', 'Your account is created. Now you can LogIn.'); method 1
        return redirect('/')->with('success', 'Your account is created. Now you can LogIn.'); // method : directly flashing through redirect method
    }
}
