<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 

use App\Models\User; 

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.ui.homepage');
    }

    public function about()
    {
        return view('frontend.ui.aboutpage');
    }

    public function contact()
    {
        return view('frontend.ui.contactpage');
    }

    // login page
    public function login()
    {
        return view('frontend.ui.loginpage');
    }

    // This shows the register page
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

        if (\Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 1. Check if the user has the 'Admin' role
            if (\Auth::user()->hasRole('Admin')) {
                // Send Admin to the backend dashboard
                return redirect('/table'); 
            }

            // 2. If not an Admin, send them to the frontend shop
            return redirect('/');
        }

    // If login fails
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}

    public function registerPost(Request $request)
    {
        // 1. Validate the input from your register page
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        // 2. Create the User in the database
        $user = \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => \Hash::make($validated['password']),
        ]);

        // 3. Automatically assign the 'User' role you just confirmed exists
        $user->assignRole('User');

        // 4. Log them in and send them to the homepage
        \Auth::login($user);

        return redirect('/')->with('success', 'Registration successful! Welcome to PSM Craft House.');
    }


    public function logout(Request $request)
    {
        // Logout
        \Auth::logout();

        // Invalidate the session to clear all data
        $request->session()->invalidate();

        // Regenerate the CSRF token for the next guest session
        $request->session()->regenerateToken();

        // Redirect to the login page with a success message
        return redirect('/login')->with('success', 'You have been logged out safely.');
    }
}