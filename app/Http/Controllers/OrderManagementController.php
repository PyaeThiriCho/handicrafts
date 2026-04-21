<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderAccepted;
use App\Mail\OrderDeclined;


class OrderManagementController extends Controller
{
    // List all orders for the Admin
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    // View specific order details (to see items ordered)
    public function show($id)
    {
        $order = Order::with('order_items.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Update status to 'accepted'
    public function accept($id)
    {
        $order = Order::findOrFail($id);
        
        // 1. Update the status to accepted
        $order->status = 'accepted';
        $order->save();

        // 2. SEND EMAIL TO THE CUSTOMER
        // Use the email address from the order record
        Mail::to($order->email)->send(new OrderAccepted($order));

        return back()->with('message', 'Order accepted and email sent to ' . $order->customer_name);
    }


    public function decline(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'declined';
        $order->save();

        // Send the decline email
        Mail::to($order->email)->send(new OrderDeclined($order));

        return back()->with('error', 'Order #' . $id . ' has been declined.');
    }
}