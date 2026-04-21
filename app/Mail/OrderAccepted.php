<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order; // <--- Make sure to import your Order model

class OrderAccepted extends Mailable
{
    use Queueable, SerializesModels;

    public $order; // <--- 1. Define the public property

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order) // <--- 2. Accept the Order object
    {
        $this->order = $order; // <--- 3. Assign it to the property
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // Adding the Order ID to the subject makes it look professional
            subject: 'Your PSM Craft House Order #' . $this->order->id . ' has been accepted!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order_accepted', 
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