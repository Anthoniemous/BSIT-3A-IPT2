<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $totalUsers = User::count();
        $totalCancelledOrders = Order::where('status', 'cancelled')->count();

        // New: Total sales from completed orders
        $totalSales = Order::where('status', 'completed')->sum('total');

        // New: Top marketable products (highest sold quantity)
        $marketableProducts = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->groupBy('products.id', 'products.name')
            ->orderBy('total_sold', 'desc')
            ->limit(5)
            ->get();

        // New: Non-marketable products (lowest sold quantity)
        $nonMarketableProducts = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->groupBy('products.id', 'products.name')
            ->orderBy('total_sold', 'asc')
            ->limit(5)
            ->get();

        // New: Recent admin activities (reports-like)
        $recentProducts = Product::latest()->limit(5)->get()->map(function($p) {
            return [
                'type' => 'Added Product',
                'details' => $p->name,
                'date' => $p->created_at,
                'link' => route('admin.products.edit', $p->id)
            ];
        });
        $recentCategories = Category::latest()->limit(5)->get()->map(function($c) {
            return [
                'type' => 'Added Category',
                'details' => $c->name,
                'date' => $c->created_at,
                'link' => route('admin.categories.edit', $c->id)
            ];
        });
        // Updated: Track recently updated orders (e.g., status changes)
        $recentHandledOrders = Order::orderBy('updated_at', 'desc')->limit(5)->get()->map(function($o) {
            $action = $o->status == 'completed' ? 'Completed Order' : 'Handled Order';
            return [
                'type' => $action,
                'details' => 'Order #' . $o->id . ' (' . ucfirst($o->status) . ')',
                'date' => $o->updated_at,
                'link' => route('admin.order.details', $o->id)
            ];
        });

        $recentAdminActivities = collect(array_merge(
            $recentProducts->toArray(),
            $recentCategories->toArray(),
            $recentHandledOrders->toArray()
        ))->sortByDesc('date')->take(10);

        // Count activities by type for chart
        $activityCounts = [
            'Added Product' => $recentProducts->count(),
            'Added Category' => $recentCategories->count(),
            'Handled Order' => $recentHandledOrders->count(),
        ];

        return view('dashboardadmin', compact(
            'totalProducts', 'totalCategories', 'totalOrders', 'pendingOrders', 'totalUsers', 'totalCancelledOrders',
            'totalSales', 'marketableProducts', 'nonMarketableProducts', 'recentAdminActivities', 'activityCounts'
        ));
    }
}
