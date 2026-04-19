<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Product;
use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;        
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
      public function showcart()
    {
        return view('frontend.ui.cartpage');
    }

    //check stock 
    public function checkStock(Request $request)
    {
        // Decode the JSON cart data sent from the browser
        $cartItems = json_decode($request->cart_data, true);
        $stockErrors = [];

        if (!$cartItems) {
            return redirect()->back()->withErrors(['Your basket data is invalid.']);
        }

        foreach ($cartItems as $item) {
            // Find product in your table
            $product = \App\Models\Product::find($item['id']);

            if (!$product) {
                $stockErrors[] = "The item '{$item['name']}' is no longer available in our portal.";
                continue;
            }

            // Compare cart quantity to your $table->integer('stock')
            if ($product->stock < $item['item']) {
                $stockErrors[] = "Only {$product->stock} units of '{$product->name}' are available.";
            }
        }

        // If there are stock issues, go back to cart with messages
        if (!empty($stockErrors)) {
            return redirect()->back()->withErrors($stockErrors);
        }

        // If stock is perfect, save to session and proceed
        session(['psm_final_cart' => $cartItems]);
        return redirect()->route('checkout.index');
    }

    
    //Checkout
    public function checkout()
    {
        $basket = session('psm_final_cart', []);
        if (empty($basket)) return redirect()->route('cartpage');
        return view('frontend.ui.checkout');
    }

    public function summary(Request $request) 
    {
        $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'payment_method' => 'required|in:kpay,wave,cod'
        ]);
        
        session(['pending_order' => $request->all()]);
        
        $basket = session('psm_final_cart', []);
        $total = collect($basket)->sum(fn($i) => $i['price'] * $i['item']);
        
        // Get the info we just saved to display it on the summary page
        $customerInfo = session('pending_order');
        
        return view('frontend.ui.summary', compact('basket', 'total', 'customerInfo'));
    }


    public function placeOrder() 
    {
        $info = session('pending_order');
        $basket = session('psm_final_cart', []);

        if (!$info) 
        {
        return redirect()->route('checkout')
            ->with('error', 'Your session has expired. Please fill in your details again.');
        }   

        $order = DB::transaction(function () use ($info, $basket) {
            $newOrder = Order::create([
                'customer_name' => $info['customer_name'],
                'email'          => $info['email'],
                'phone' => $info['phone'],
                'address' => $info['address'],
                'total_amount' => collect($basket)->sum(fn($i) => $i['price'] * $i['item']),
                'payment_method' => $info['payment_method'],
                'status' => ($info['payment_method'] == 'cod') ? 'processing' : 'pending',
            ]);

            foreach ($basket as $item) {
                Order_Item::create([
                    'order_id' => $newOrder->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['item'],
                    'price' => $item['price'],
                ]);
                Product::find($item['id'])->decrement('stock', $item['item']);
            }
            return $newOrder;
        });

        session()->forget(['psm_final_cart', 'pending_order']);

       // Send the email to the customer
        Mail::to($order->email)->send(new OrderPlaced($order));

        return redirect()->route('order.success', $order->id)
                        ->with('message', 'Check your email for confirmation!');
    }

    public function orderSuccess($id) {
        $order = Order::findOrFail($id);
        return view('frontend.ui.order_success', compact('order'));
    }

}
