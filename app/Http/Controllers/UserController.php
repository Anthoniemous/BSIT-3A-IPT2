<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Models\Transaction;

class UserController extends Controller
{
    // Constructor - runs once per controller load
    public function __construct()
    {
        // parent::__construct(); // not required, but safe
        $this->middleware('auth');
    }

    // Main user dashboard
    public function index()
    {
        $user = Auth::user();

        // Get all available menu items
        $menuItems = MenuItem::where('available', true)->get();

        // Get user's recent transactions
        $transactions = Transaction::with(['menuItem', 'payment', 'shipment'])
            ->where('user_id', $user->id)
            ->latest('order_date')
            ->take(5)
            ->get();

        return view('user.user-dashboard', compact('user', 'menuItems', 'transactions'));
    }

    // Optional: profile page
    public function show()
    {
        $user = Auth::user();
        return view('user-profile', compact('user'));
    }
}
