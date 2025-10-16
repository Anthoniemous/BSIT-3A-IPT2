<?php
// app/Http/Controllers/AdminDashboardController.php
namespace App\Http\Controllers;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // create this blade later
    }
}

