<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }




    // Handle profile image upload
 public function updateImage(Request $request)
{
    // Validate the request
    $request->validate([
        'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $user = Auth::user();
    if (! $user) {
        return redirect()->route('login'); // or abort(403)
    }

    // Debug line (uncomment to inspect): dd($request->file('profile_image'));

    // Delete old image if it exists
    if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
        Storage::disk('public')->delete($user->profile_image);
    }

    // Store new image in storage/app/public/profile_images
    $path = $request->file('profile_image')->store('profile_images', 'public');

    // Update DB
    $user->profile_image = $path;
    $user->save();

    // Use the same session key you check in the view. 
    // I'm returning 'status' => 'profile-image-updated' to match earlier examples.
    return back()->with('status', 'profile-image-updated');
}



}
