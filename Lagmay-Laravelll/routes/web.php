<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Default route
Route::get('/', function () {
    return view('welcome');
});

// Home route (kung naa kay HomeController)
Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');

// Auth routes (login, register, etc.)
Auth::routes();

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard'); // this will load resources/views/dashboard.blade.php
})->middleware(['auth'])->name('dashboard');
