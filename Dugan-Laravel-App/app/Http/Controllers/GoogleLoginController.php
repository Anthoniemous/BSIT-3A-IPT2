<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleLoginController extends Controller
{
    // Redirect user to Google login page
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle callback from Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Check if user already exists
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Create a new user if not exists
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)), // random password
                    'google_id' => $googleUser->getId(),
                ]);
            }

            // Log the user in
            Auth::login($user);

            // Redirect to dashboard (or wherever you want)
            return redirect('/dashboard');
        } catch (\Exception $e) {
            // Optional: handle errors gracefully
            return redirect('/login')->with('error', 'Something went wrong during Google login.');
        }
    }
}
