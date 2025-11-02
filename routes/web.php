<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Controllers
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfilePhotoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🌐 Public Route
Route::get('/', function () {
    return view('welcome');
});

// 🔒 Authenticated User Routes
Route::middleware(['auth'])->group(function () {

    // User Dashboard
    Route::get('/user-dashboard', [UserController::class, 'index'])
        ->name('user.dashboard');

    // User Profile
    Route::get('/user/profile', [UserController::class, 'show'])
        ->name('user.profile');

    // Edit & Update Profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
    Route::post('/profile/photo/update', [ProfilePhotoController::class, 'update'])
    ->name('profile.photo.update')
    ->middleware('auth');

    // Products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::patch('/products/{id}/deactivate', [ProductController::class, 'deactivate'])->name('products.deactivate');
    Route::resource('products', ProductController::class);
});

// 👑 Admin Routes

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [AdminProfileController::class, 'update'])->name('profile.update');
});

Route::prefix('admin')->middleware(['admin'])->group(function () {

    //profile photo

    Route::get('profile/photo', [ProfilePhotoController::class, 'edit'])->name('admin.profile.edit');
    Route::post('profile/photo', [ProfilePhotoController::class, 'update'])->name('admin.profile.update');

    // Dashboard
    Route::get('/dashboard', [MenuController::class, 'dashboard'])
        ->name('admin.dashboard');

    // Menu Management
    Route::post('/createmenu', [MenuController::class, 'storeMenu'])->name('admin.createmenu');
    Route::get('/editmenu/{id}', [MenuController::class, 'editMenu'])->name('admin.editmenu');
    Route::put('/updatemenu/{id}', [MenuController::class, 'updateMenu'])->name('admin.updatemenu');
    Route::delete('/deletemenu/{id}', [MenuController::class, 'deleteMenu'])->name('admin.deletemenu');

    // Admin Registration
    Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'register'])->name('admin.register.submit');

    // Admin Login
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// 🧭 Admin Dashboard View (Session-based)
Route::get('/dashboard/admin', function () {
    if (!session('admin_id')) {
        return redirect()->route('admin.login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    return view('dashboardadmin');
})->name('dashboardadmin');

// 🌍 Google OAuth
Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name("google_auth");

Route::get('/auth/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    $user = User::updateOrCreate(
        ['google_id' => $googleUser->id],
        [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]
    );

    Auth::login($user);

    return redirect()->route('user.dashboard');
});

// 🏠 Default Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
