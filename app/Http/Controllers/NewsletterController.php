<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    //

    public function __invoke(){
        request()->validate(['email' => 'required|email']);


        try{
            $newsletter = new Newsletter();
            $newsletter -> subscribe(request('email'));
        }catch (\Exception $e){
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added to the news letter'
            ]);
        }


        return redirect('/') -> with('success', 'You are subscribed to our newsletter');

    }
}
