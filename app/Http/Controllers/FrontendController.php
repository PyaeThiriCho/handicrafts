<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 

use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        
        $bestsellerNames = [
            'White Elephant',
            '3-Tier Stand',
            'Market Tote Bag',
            'Food Cover Dome',
            'Lacquer Teapot',
            'Round Handle Straw Bag',
            'Pearl-Handle Rattan Bag',
            'Mini Painted Pots',
        ];

        $bestSellers = Product::whereIn('name', $bestsellerNames)->get();
        $products = Product::latest()->take(8)->get();

        return view('frontend.ui.homepage', compact('categories', 'products', 'bestSellers'));
    }

    public function showCategory($id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->get();

        return view('frontend.ui.all_products', compact('categories', 'products', 'category'));
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); 
        
        $relatedProducts = Product::where('category_id', $product->category_id)
                                ->where('id', '!=', $id)
                                ->take(4)
                                ->get();
        
        return view('frontend.ui.product_details', compact('product', 'categories', 'relatedProducts'));
    }

    public function allProducts(Request $request)
    {
        $categories = Category::all();
        $query = Product::query();

        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        $products = $query->latest()->paginate(12);

        return view('frontend.ui.all_products', compact('categories', 'products'));
    }

    public function about()
    {
        $categories = Category::all();
        return view('frontend.ui.aboutpage', compact('categories'));
    }

    public function contact()
    {
        $categories = Category::all();
        return view('frontend.ui.contactpage', compact('categories'));
    }

    // --- Authentication Logic ---

    public function login()
    {
        return view('frontend.ui.loginpage');
    }

    public function register()
    {
        return view('frontend.ui.registerpage');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 1. Check if login matches an Admin from 'admins' table
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/table'); // Admin Dashboard
        }

        // 2. Check if login matches a User from 'users' table
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/'); // Customer Homepage
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function registerPost(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::guard('web')->login($user);

        return redirect('/')->with('success', 'Registration successful! Welcome to PSM Craft House.');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }

        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out safely.');
    }
}