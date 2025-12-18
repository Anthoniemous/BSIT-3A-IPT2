<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Fetch all categories
        $products = Product::with('category')->get(); // Fetch products with category relationship (if needed for the view)

        return view('dashboard', compact('categories', 'products'));
    }
}