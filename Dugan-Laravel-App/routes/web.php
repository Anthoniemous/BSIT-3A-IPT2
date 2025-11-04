<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

// ===========================
// Public Routes
// ===========================
Route::get('/', function () {
    return view('welcome');
});

// Google Login routes
Route::get('/login/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/login/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);

// ===========================
// Authenticated User Routes (Buyers / Normal Users)
// ===========================
Route::middleware(['auth', 'verified'])->group(function () {
    // User profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    
});




// ===========================
// Admin Routes (Protected by 'admin' middleware)
// ===========================
// Route::middleware(['auth', 'admin'])->group(function () {
    
    
// });


// Admin dashboards
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');



// Admin product management
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('products');
        Route::get('/products/list', 'list');
         Route::get('/products/shop','shop')->name('products.shop');
        Route::post('/products/add', 'add');
         // View single product details
        Route::get('/products/{id}', 'show')->name('products.show');
          Route::put('/products/update/{id}', 'edit') ->name('cars.update');
        Route::delete('/products/{id}', 'delete')->name('cars.delete');
        // Public shop route (for buyers)
       
        });
      

   

// ===========================
// Redirect Users After Login (optional)
// ===========================
Route::get('/redirect', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin/dashboard');
    }
    return redirect('/dashboard');
});

require __DIR__.'/auth.php';
