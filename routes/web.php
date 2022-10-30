<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\PagesController;
use Illuminate\Support\Facades\Route;


// Frontend Route
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact-post', [PagesController::class, 'contact_post'])->name('contact_post');



// Admin route group
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('index');
    Route::resource('category', CategoryController::class);
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
