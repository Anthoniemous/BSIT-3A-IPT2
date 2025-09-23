<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleAuthController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});


Route::get('/', function () {
    return view('welcome'); // this will load resources/views/welcome.blade.php
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// Extra Route

Route::get('/extra', function () {
    return view('profilee');
})->middleware(['auth', 'verified'])->name('profilee');
Route::get('/message', function () {
    return view('message');
})->middleware(['auth', 'verified'])->name('message');
Route::get('/services', function () {
    return view('services');
})->middleware(['auth', 'verified'])->name('services');
Route::get('/about', function () {
    return view('about');
})->middleware(['auth', 'verified'])->name('about');
Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth', 'verified'])->name('contact');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);


require __DIR__.'/auth.php';
