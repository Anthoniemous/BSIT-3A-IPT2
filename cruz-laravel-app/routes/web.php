<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HomeController;

// Redirect to Google
Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')
        ->scopes(['openid', 'profile', 'email']) // Optional: request specific scopes
        ->redirect();
});

// Google OAuth callback
Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    $user = User::updateOrCreate(
        ['google_id' => $googleUser->getId()],
        [
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]
    );

    Auth::login($user);

    return redirect('/dashboard');
});

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', function(){
    return view('users.home');
})->middleware(['auth'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::get('auth/google/redirect', [GoogleAuthController::class,'redirect'])->name('google.redirect');
Route::get('auth/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';



