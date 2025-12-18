<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;  // Add this at the top if not already present

class AdminController extends Controller
{
    // 🟠 Show admin login page
    public function showLoginForm()
    {
        return view('loginadmin');
    }

    // 🟠 Handle admin login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();
            return redirect()->route('dashboardadmin')
                ->with('success', 'Welcome back, ' . $admin->name . '!');
        }

        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    // 🟠 Logout admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'You have been logged out.');
    }

    // 🟠 Show registration form
    public function showRegisterForm()
    {
        return view('registeradmin');
    }

    // 🟠 Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);

        Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Admin registered successfully!');
    }

    // 🟠 Dashboard
    public function dashboardadmin()
    {
        return view('dashboardadmin');
    }

    public function manageproducts()
    {
        return view('manageproducts');
    }

    public function managecategories()
    {
        return view('managecategories');
    }

    // 🟠 Admin Profile Page
    public function edit()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    // 🟠 Update Profile Image
    public function updateImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $admin = Auth::guard('admin')->user();

        // Delete old image if exists
        if ($admin->profile_image && Storage::disk('public')->exists($admin->profile_image)) {
            Storage::disk('public')->delete($admin->profile_image);
        }

        // Upload new one
        $path = $request->file('profile_image')->store('admin_profiles', 'public');
        $admin->profile_image = $path;
        $admin->save();

        return back()->with('success', 'Profile image updated successfully!');
    }

    // 🟠 Update Admin Info
    public function updateInfo(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $admin = Auth::guard('admin')->user();
        $admin->update($request->only('name', 'email'));

        return back()->with('success', 'Profile information updated successfully!');
    }

    // 🟠 Update Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|confirmed|min:8',
        ]);

        $admin = Auth::guard('admin')->user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with('success', 'Password updated successfully!');
    }

    // 🟠 Delete Account
    public function destroy()
    {
        $admin = Auth::guard('admin')->user();
        $admin->delete();

        Auth::guard('admin')->logout();

        return redirect('/')->with('success', 'Admin account deleted successfully.');
    }

    public function orders()
    {
        $orders = Order::with('user')->latest()->paginate(10);  // Paginate for large lists
        $totalOrders = Order::count();  // Total count for display
        return view('admin.orders', compact('orders', 'totalOrders'));
    }

    public function orderDetails($id)
    {
        $order = Order::with('items.product', 'user')->findOrFail($id);
        return view('admin.order_details', compact('order'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|string|in:pending,completed,cancelled',  // Adjust statuses as needed
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}
