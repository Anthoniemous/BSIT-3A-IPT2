<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // TEMPORARY DEBUG: Check if user is logged in and show user info
        dd([
            'logged_in' => Auth::check(),
            'user' => Auth::user(),
        ]);

        // Actual check
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // If not admin, redirect to home with error
        return redirect('/')->with('error', 'You do not have admin access.');
    }
}
