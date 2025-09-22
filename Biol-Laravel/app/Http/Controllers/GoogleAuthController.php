<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    /**
     * Redirect to Google login page
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google callback
     */
    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            // Find user by google_id OR email
            $user = User::where('google_id', $google_user->getId())
                        ->orWhere('email', $google_user->getEmail())
                        ->first();

            if (!$user) {
                // First time login → create user
                $user = User::create([
                    'name'      => $google_user->getName(),
                    'email'     => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'password'  => null, // password not needed
                ]);
            } else {
                // If user exists but has no google_id, update it
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $google_user->getId(),
                    ]);
                }
            }

            // Log in the user
            Auth::login($user);

            return redirect()->intended('/dashboard');

        } catch (\Exception $th) {
            dd('Something Fishy!', $th->getMessage());
        }
    }
}
