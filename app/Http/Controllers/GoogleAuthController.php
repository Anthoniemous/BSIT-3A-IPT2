<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    // Redirect to Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    // Handle callback
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Check kung existing user na by email
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Kung wala pa, create new user
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(), // ✅ save google_id
                    'password' => bcrypt('123456dummy'),
                ]);
            } else {
                // Update google_id kung wala pa naka-save
                if (is_null($user->google_id)) {
                    $user->update(['google_id' => $googleUser->getId()]);

                    dd("User updated with google_id: " . $googleUser->getId());
                }
            }

            // I-login ang user
            Auth::login($user);

            return redirect()->intended('/dashboard'); // or imong home route
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
