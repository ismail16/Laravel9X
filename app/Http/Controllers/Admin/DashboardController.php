<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
         // reload template layout
        Inertia::version('admin');

        return Inertia::render('backend/dashboard');
    }
}
