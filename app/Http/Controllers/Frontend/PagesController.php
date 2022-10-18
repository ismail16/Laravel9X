<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function index(){
        return Inertia::render('frontend/index');
    }

    public function login(){
        return Inertia::render('Auth/Login');
    }

    public function register(){
        return Inertia::render('Auth/Register');
    }
}
