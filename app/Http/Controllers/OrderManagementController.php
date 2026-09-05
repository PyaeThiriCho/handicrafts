<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderAccepted;
use App\Mail\OrderDeclined;
use Exception;

class OrderManagementController extends Controller
{
    // List all orders for the Admin with optional date and status filters
    public function index(Request $request)
    {
        $query = Order::orderBy('id', 'asc');

        // 1. Filter by specific date if selected
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // 2. Filter by Status (Updated 'declined' to 'canceled')
        if ($request->filled('status')) {
            $status = strtolower($request->status);
            if ($status === 'pending') {
                // Include both 'pending' and 'processing' if applicable
                $query->whereIn('status', ['pending', 'processing']);
            } else {
                $query->where('status', $status);
            }
        }

        // Retain query string across pagination
        $orders = $query->paginate(70)->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }

    // View specific order details
    public function show($id)
    {
        $order = Order::with('order_items.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Update status to 'accepted' with safe email delivery
    public function accept($id)
    {
        $order = Order::findOrFail($id);

        try {
            DB::transaction(function () use ($order) {
                $order->status = 'accepted';
                $order->save();

                if (!empty($order->email)) {
                    Mail::to($order->email)->send(new OrderAccepted($order));
                }
            });

            return back()->with('message', 'Order #' . $id . ' accepted successfully.');
        } catch (Exception $e) {
            return back()->with('error', 'Status updated, but email failed to send: ' . $e->getMessage());
        }
    }

    // Update status to 'canceled' with safe email delivery
    public function decline(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        try {
            DB::transaction(function () use ($order) {
                // Set status to 'canceled'
                $order->status = 'canceled';
                $order->save();

                if (!empty($order->email)) {
                    Mail::to($order->email)->send(new OrderDeclined($order));
                }
            });

            return back()->with('error', 'Order #' . $id . ' has been canceled.');
        } catch (Exception $e) {
            return back()->with('error', 'Status updated, but email failed to send: ' . $e->getMessage());
        }
    }
}