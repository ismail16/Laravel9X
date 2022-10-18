<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
   public function index()
   {
    // return "hello";
    return Inertia::render('backend/dashboard');
    return Inertia::render('frontend/index');
   }
}
