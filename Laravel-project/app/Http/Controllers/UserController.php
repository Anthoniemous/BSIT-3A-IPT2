<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display the user dashboard
     */
    public function dashboard(): View
    {
        $products = Product::where('status', 'Active')->get();
        $userEmail = Auth::user()->email;

        
        return view('user.dashboard', compact('products'));
    }

    /**
     * Display all products for users
     */
    public function products(): View
    {
        $products = Product::where('status', 'Active')->get();
        return view('user.products', compact('products'));
    }
}
