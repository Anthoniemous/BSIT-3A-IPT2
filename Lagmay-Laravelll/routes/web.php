<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleAuthController;


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
Auth::routes([
    'verify' => true
]);

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard'); // this will load resources/views/dashboard.blade.php
})->middleware(['auth'])->name('dashboard');

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle']);
