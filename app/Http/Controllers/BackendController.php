<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class BackendController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();
        $categories = Category::latest()->take(5)->get();
        $totalUsers = User::count();
        
        // Real counts & low stock items from database
        $totalProducts = Product::count();
        $lowStockProducts = Product::where('stock', '<=', 5)->get(); 
        $pendingOrders = 0; // Update when order table is connected

        // Count both 'pending' and 'processing'
        $pendingOrders = Order::whereIn('status', ['pending', 'processing', 'Pending', 'Processing'])->count();
        
        return view('backend.table', compact(
            'totalCategories', 
            'categories', 
            'totalUsers', 
            'totalProducts', 
            'pendingOrders',
            'lowStockProducts'
        ));
    }
}