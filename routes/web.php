<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\PagesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


// Frontend Route
Route::get('/', [PagesController::class, 'index'])->name('index');



// Admin route group
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('index');
});




// Route::get('/', function () {
//     return Inertia::render('frontend/index', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// })->name('index');

// Route::get('/dashboard', function () {
//     return Inertia::render('backend/dashboard');

// })->middleware(['auth', 'verified'])->name('dashboard');

// Auth route
require __DIR__.'/auth.php';
