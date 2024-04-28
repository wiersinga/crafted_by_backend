<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendCodeResetPassword extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $code;

    /**
     * Create a new message instance.
     */
    public function __construct($code)
    {
        $this->code = $code;

    }
//@component('mail::message')
//<h1>We have received your request to reset your account password</h1>
//<p>You can use the following code to recover your account:</p>
//
//@component('mail::panel')
//{{ $code }}
//@endcomponent
//
//<p>The allowed duration of the code is one hour from the time the message was sent</p>
//@endcomponent
    public function build()
    {
        return $this->markdown('emails.send-code-reset-password');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Code Reset Password',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
