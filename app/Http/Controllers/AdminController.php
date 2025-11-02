<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login'); // this is your admin login Blade file
    }

    public function login(Request $request)
    {
        // You can add admin authentication logic here later
        return redirect()->route('admin.dashboard');
    }
}
