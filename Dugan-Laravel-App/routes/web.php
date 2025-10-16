<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// User dashboard, accessible to authenticated & verified users
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin dashboard, accessible only to authenticated admins
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Google Login routes
Route::get('/login/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/login/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);

Route::controller(ProductController::class) -> group(function(){
    Route::get("/products", "index") -> name("products");
    Route::get("/products/index","list");
    Route::post("/products/add","add");
    Route::put("/products/update/{id}","update");
        // Public shop-style product listing (grid)
        Route::get('/products/shop', 'shop')->name('products.shop');
    
});

// Return a single product as JSON for editing via AJAX
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Delete (AJAX)
Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('cars.delete');


require __DIR__.'/auth.php';
