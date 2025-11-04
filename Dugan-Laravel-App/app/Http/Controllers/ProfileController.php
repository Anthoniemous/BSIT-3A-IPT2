<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


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
        $user = $request->user();

        $data = $request->validated();

        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // Process and store new image
            $image = $request->file('profile_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Move uploaded file to temp location
            $tempPath = $image->store('temp', 'public');

            // Use native PHP GD functions for image processing
            $sourcePath = storage_path('app/public/' . $tempPath);
            $destinationPath = storage_path('app/public/profile_images/' . $imageName);

            // Ensure destination directory exists
            $destinationDir = dirname($destinationPath);
            if (!is_dir($destinationDir)) {
                mkdir($destinationDir, 0755, true);
            }

            // Get image info
            $imageInfo = getimagesize($sourcePath);
            if (!$imageInfo) {
                throw new \Exception('Invalid image file');
            }

            $mime = $imageInfo['mime'];
            $width = $imageInfo[0];
            $height = $imageInfo[1];

            // Create image resource based on type
            switch ($mime) {
                case 'image/jpeg':
                    $sourceImage = \imagecreatefromjpeg($sourcePath);
                    break;
                case 'image/png':
                    $sourceImage = \imagecreatefrompng($sourcePath);
                    break;
                case 'image/gif':
                    $sourceImage = \imagecreatefromgif($sourcePath);
                    break;
                default:
                    throw new \Exception('Unsupported image type');
            }

            // Calculate crop dimensions (square crop from center)
            $size = min($width, $height);
            $x = ($width - $size) / 2;
            $y = ($height - $size) / 2;

            // Create square cropped image
            $croppedImage = \imagecrop($sourceImage, ['x' => $x, 'y' => $y, 'width' => $size, 'height' => $size]);

            // Resize to 200x200
            $finalImage = \imagecreatetruecolor(200, 200);
            \imagecopyresampled($finalImage, $croppedImage, 0, 0, 0, 0, 200, 200, $size, $size);

            // Save as JPEG
            \imagejpeg($finalImage, $destinationPath, 90);

            // Clean up
            \imagedestroy($sourceImage);
            \imagedestroy($croppedImage);
            \imagedestroy($finalImage);

            // Delete temp file
            Storage::disk('public')->delete($tempPath);

            $data['profile_image'] = 'profile_images/' . $imageName;
        } elseif ($request->has('remove_profile_image')) {
            // Handle profile image removal
            if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
                Storage::disk('public')->delete($user->profile_image);
            }
            $data['profile_image'] = null;
        }

        $user->fill($data);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

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
}
