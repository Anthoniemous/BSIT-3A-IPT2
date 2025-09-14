<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        // Always use stateless() in local dev or when using custom domains
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
{
    try {
        $google_user = Socialite::driver('google')->user();

        // ✅ 1. Try to find by google_id first
        $user = User::where('google_id', $google_user->getId())->first();

        if (!$user) {
            // ✅ 2. If no google_id match, check if email already exists
            $user = User::where('email', $google_user->getEmail())->first();

            if ($user) {
                // Attach google_id to the existing account
                $user->update([
                    'google_id' => $google_user->getId()
                ]);
            } else {
                // Create new user if neither email nor google_id exist
                $user = User::create([
                    'name'      => $google_user->getName(),
                    'email'     => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);
            }
        }

        Auth::login($user);
        return redirect()->intended('dashboard');

    } catch (\Throwable $th) {
        dd('Something went wrong! ' . $th->getMessage());
    }
}

}
