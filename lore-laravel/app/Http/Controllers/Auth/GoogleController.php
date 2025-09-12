<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    // Redirect to Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Get Gmail
            $email = $googleUser->getEmail();

            // Find or create local user
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt('password123') // fake password
                ]
            );

            // Log user in
            Auth::login($user);

            return redirect()->intended('/dashboard');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
