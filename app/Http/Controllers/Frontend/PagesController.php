<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function index(){
        return Inertia::render('frontend/index');
    }

    public function contact(){
        return Inertia::render('frontend/contact');
    }

    public function contact_post(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'subject' => 'required',
            'message' => 'required',
        ]);


        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;


        $contact->save();
        return redirect()->back()->with('message', 'Message Sent successfully');
    }

    public function login(){
        return Inertia::render('Auth/Login');
    }

    public function register(){
        return Inertia::render('Auth/Register');
    }
}
