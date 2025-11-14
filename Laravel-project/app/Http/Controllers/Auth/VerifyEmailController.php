<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->user();
        
        if ($user->hasVerifiedEmail()) {
            // Already verified, redirect based on role
            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard', absolute: false).'?verified=1');
            } else {
                return redirect()->intended(route('user.dashboard', absolute: false).'?verified=1');
            }
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        // Redirect based on role after verification
        if ($user->role === 'admin') {
            return redirect()->intended(route('admin.dashboard', absolute: false).'?verified=1');
        } else {
            return redirect()->intended(route('user.dashboard', absolute: false).'?verified=1');
        }
    }
}
