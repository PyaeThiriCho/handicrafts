<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 

use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        
       // Fetch products. You can use ->take(8) to limit how many show on the home page
        $products = Product::latest()->take(8)->get();

        return view('frontend.ui.homepage', compact('categories', 'products'));
    }

    /**
     * FIX: Added the missing showCategory method 
     * This handles clicking a category like "Pottery" or "Woodwork"
     */
    public function showCategory($id)
    {
        $categories = Category::all(); // For the navbar
        $category = Category::findOrFail($id); // The specific category selected
        
        // Only fetch products belonging to this category
        $products = Product::where('category_id', $id)->get();

        return view('frontend.ui.homepage', compact('categories', 'products', 'category'));
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); 
        
        // Fetch related products from the same category, excluding the current one
        $relatedProducts = Product::where('category_id', $product->category_id)
                                ->where('id', '!=', $id)
                                ->take(4) // Shows 4 related items
                                ->get();
        
        return view('frontend.ui.product_details', compact('product', 'categories', 'relatedProducts'));
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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->hasRole('Admin')) {
                return redirect('/table'); 
            }

            return redirect('/');
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

        $user->assignRole('User');
        Auth::login($user);

        return redirect('/')->with('success', 'Registration successful! Welcome to PSM Craft House.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out safely.');
    }
}