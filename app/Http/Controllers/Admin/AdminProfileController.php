<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function edit()
    {
        $admin = Auth::user();
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Auth::user();

        // Validate inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile_image' => 'nullable|image|max:2048', // optional, max 2MB
        ]);

        // Update name and email
        $admin->name = $request->name;
        $admin->email = $request->email;

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($admin->profile_photo_path) {
                Storage::delete($admin->profile_photo_path);
            }

            $path = $request->file('profile_image')->store('profile-photos', 'public');
            $admin->profile_photo_path = $path;
        }

        $admin->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
