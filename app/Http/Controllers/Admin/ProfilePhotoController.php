<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilePhotoController extends Controller
{
    public function edit()
    {
        $admin = Auth::user(); // Assuming admins are using the same User model
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048', // max 2MB
        ]);

        $admin = Auth::user();

        // Delete old photo if exists
        if ($admin->profile_photo_path) {
            Storage::delete($admin->profile_photo_path);
        }

        // Store new photo
        $path = $request->file('photo')->store('admin-photos', 'public');

        // Update admin record
        $admin->profile_photo_path = $path;
        $admin->save();

        return redirect()->back()->with('success', 'Profile photo updated!');
    }
}
