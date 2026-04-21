<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order; // <--- Make sure to import your Order model

class PaymentSlipUploaded extends Mailable
{
    use Queueable, SerializesModels;

    public $order; // <--- 1. Define the public property

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order) // <--- 2. Accept the order here
    {
        $this->order = $order; // <--- 3. Assign it
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // 4. Improved subject so you know which order it is from your phone
            subject: 'New Payment Slip: Order #' . $this->order->id,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_payment_notification',
            // You actually don't strictly need 'with' if the property is public,
            // but keeping it is fine and explicit!
            with: ['order' => $this->order],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}