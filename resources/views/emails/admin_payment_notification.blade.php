<h3>New Payment Slip Received!</h3>
<p><strong>Order ID:</strong> #{{ $order->id }}</p>
<p><strong>Customer:</strong> {{ $order->customer_name }}</p>
<p><strong>Amount:</strong> {{ number_format($order->total_amount) }} K</p>
<hr>
<p>Please log in to the <a href="{{ route('admin.orders.show', $order->id) }}">Admin Panel</a> to verify the slip and accept the order.</p>