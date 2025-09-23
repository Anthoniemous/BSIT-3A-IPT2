<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class GoogleController extends Controller
{
    // Step 1: Redirect to Google
    public function redirect(){
         return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
        $user = Socialite::driver('google')->stateless()->user();

        $findUser = User::where('google_id', $user->id)->first();

        if($findUser){
            Auth::login($findUser);

            return redirect('/dashboard');

        }else{
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'avatar' =>  $user->avatar,
                'password' => encrypt('password')      
            ]);

            Auth::login($newUser);

            return redirect('/dashboard');
        }

    }
    
}

   