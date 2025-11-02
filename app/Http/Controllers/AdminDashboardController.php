<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Count total products and categories
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        // Pass data to the view
        return view('dashboardadmin', compact('totalProducts', 'totalCategories'));
    }
}
