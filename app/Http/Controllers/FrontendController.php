<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function register()
    {
        return view('frontend.ui.registerpage');
    }

     public function login()
    {
        return view('frontend.ui.loginpage');
    }
}
