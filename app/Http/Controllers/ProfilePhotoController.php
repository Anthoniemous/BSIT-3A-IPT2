<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePhotoController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $user = Auth::user();

        // Save file to storage/app/public/avatars
        $path = $request->file('avatar')->store('avatars', 'public');

        // Save filename in DB (assuming you have a `profile_photo_path` column)
        $user->profile_photo_path = $path;
        $user->save();

        return redirect('/user-dashboard')->with('status', 'Profile updated!');
    }
}
