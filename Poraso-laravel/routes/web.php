<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('auth.google');
 Route::get('/auth/google/callback', [GoogleController::class, 'callbackGoogle'])->name('auth.google.callback');



require __DIR__.'/auth.php';
