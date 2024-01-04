<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function create(){
        return view('sessions.create');
    }

    public function store(){
        //validate
        $attribute = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //login
        if(auth()->attempt($attribute)){
            //redirect with success message
            return redirect('/')->with('success', 'Welcome back!');
        }

        // if auth failed
        return back()->withErrors(['email' => 'Your provided credentials could not be verified.']);


    }

    public function destroy(){
//        dd('logged out');
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
