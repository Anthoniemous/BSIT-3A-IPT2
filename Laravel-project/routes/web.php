<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use Laravel\Socialite\Facades\Socialite;
 
Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google-auth');

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
 
Route::get('/auth/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    // Check if email already exists
    $existingUser = User::where('email', strtolower($googleUser->email))->first();
    
    if ($existingUser) {
        // If user exists with this email but no google_id, update with google_id
        if (!$existingUser->google_id) {
            $existingUser->update([
                'google_id' => $googleUser->id,
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
            ]);
            Auth::login($existingUser);
        } else {
            // User exists with google_id, just login
            Auth::login($existingUser);
        }
        
        $user = $existingUser;
    } else {
        // Create new user
        $user = User::create([
            'name' => $googleUser->name,
            'email' => strtolower($googleUser->email),
            'google_id' => $googleUser->id,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
            'role' => 'user',
            'email_verified_at' => now(), // Google emails are already verified
        ]);
        
        Auth::login($user);
    }

    // Redirect based on role
    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    } else {
        return redirect('/user/dashboard');
    }
});


Route::get('/', function () {
    $products = Product::where('status', 'Active')->latest()->take(12)->get();
    return view('welcome', compact('products'));
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


use App\Http\Controllers\ProductController;

use App\Http\Controllers\CatergoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrdersController;




Route::middleware('auth')->group(function () {
    // Admin routes
    Route::middleware('admin')->group(function () {
        Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    // User routes - require email verification
    Route::middleware('verified')->group(function () {
        Route::get('/user/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/user/products', [App\Http\Controllers\UserController::class, 'products'])->name('user.products');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/product', [ProductController::class, 'index'])->name('products.product');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::resource('products', ProductController::class);
    Route::patch('/products/{id}/deactivate', [ProductController::class, 'deactivate'])->name('products.deactivate');

    Route::get('/category', [CatergoryController::class, 'index'])->name('categorys.category');

    Route::get('/customer', [CustomerController::class, 'index'])->name('customers.customer');

    Route::get('/order', [OrdersController::class, 'index'])->name('orders.order');


  
Route::post('/profile/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('profile.uploadPhoto');


});

require __DIR__.'/auth.php';
