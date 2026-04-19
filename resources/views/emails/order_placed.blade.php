
<div style="font-family: sans-serif; padding: 20px; background-color: #fcf6e9; border-radius: 10px;">
    <h2 style="color: #4a3728;">PSM Craft House</h2>
    <p>Hello <strong>{{ $order->customer_name }}</strong>,</p>
    <p>Thank you for your order! Your Order ID is: <span style="color: #6c9eff; font-weight: bold;">#{{ $order->id }}</span></p>
    
    <div style="background: white; padding: 15px; border-radius: 8px;">
        <p><strong>Total Amount:</strong> {{ number_format($order->total_amount) }} K</p>
        <p><strong>Payment Method:</strong> {{ strtoupper($order->payment_method) }}</p>
    </div>

    <p style="margin-top: 20px; font-size: 12px; color: #777;">We will process your order soon.</p>
</div>

