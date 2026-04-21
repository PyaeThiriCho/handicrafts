<div style="font-family: sans-serif; padding: 20px; border: 1px solid #eee; border-radius: 10px; max-width: 600px;">
    <h2 style="color: #8b0000;">Order Accepted!</h2>
    <p>Mingalaba <strong>{{ $order->customer_name }}</strong>,</p>
    
    <p>Good news! We have verified your payment for <strong>Order #{{ $order->id }}</strong>. Our artisans have started preparing your handicrafts.</p>

    <div style="background-color: #fdfaf5; padding: 15px; border-radius: 8px; margin: 20px 0;">
        <p style="margin: 0;"><strong>Total Amount Paid:</strong> {{ number_format($order->total_amount) }} K</p>
        <p style="margin: 0;"><strong>Shipping Address:</strong> {{ $order->address }}</p>
    </div>

    <p>We will notify you once your package is on its way. Thank you for supporting traditional Myanmar handicrafts!</p>
    
    <hr style="border: 0; border-top: 1px solid #eee;">
    <p style="font-size: 12px; color: #888;">PSM Craft House - Traditional Handmade Portal</p>
</div>