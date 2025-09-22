<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfileController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Default route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('/home');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

// Home route (kung naa kay HomeController)
Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');

// Auth routes (login, register, etc.)
Auth::routes([
    'verify' => true
]);

//// Dashboard route
//Route::get('/dashboard', function () {
  ///  return view('dashboard'); // this will load resources/views/dashboard.blade.php
//})->middleware(['auth'])->name('dashboard');

Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callbackGoogle']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
