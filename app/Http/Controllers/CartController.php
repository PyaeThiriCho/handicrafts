<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
      public function showcart()
    {
        return view('frontend.ui.cartpage');
    }
}
