<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public $order) {}

    // 2. Define the subject of the email
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Confirmation - PSM Craft House',
        );
    }

    // 3. ONLY ONE content function allowed!
    public function content(): Content
    {
        return new Content(
            view: 'emails.order_placed', // Make sure this matches your file name
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
