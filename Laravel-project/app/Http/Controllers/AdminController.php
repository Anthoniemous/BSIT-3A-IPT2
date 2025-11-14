<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function dashboard(): View
    {
        return view('dashboard');
    }
}
