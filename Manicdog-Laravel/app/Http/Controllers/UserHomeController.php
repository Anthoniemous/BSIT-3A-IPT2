<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index()
    {
        // You can pass user data or anything else to the view
        $user = auth()->user();

        return view('layouts.home', compact('user'));

    }
}
