<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in and has admin role
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Otherwise, redirect or abort
        return redirect('/')->with('error', 'Access denied.');
    }
}
