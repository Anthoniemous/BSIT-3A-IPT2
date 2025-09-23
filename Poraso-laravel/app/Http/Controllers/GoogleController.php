<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;


class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(Request $request)
    {
       $user = Socialite::driver('google')->user();

        
        $findUser = User::where('google_id', $user->id)->first();

        if ($findUser) {
            Auth::login($findUser);

            return redirect('/dashboard');

        } else {
            
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'avatar' => $user->avatar,
                'password' => encrypt('password')
            ]);

            Auth::login($newUser);
        }

        return redirect('/dashboard');
    }
}
