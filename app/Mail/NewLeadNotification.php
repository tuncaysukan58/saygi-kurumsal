<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class NewLeadNotification extends Mailable
{
    use Queueable;

    /**
     * @param  array<string, string|null>  $lines  Label => value pairs to render in the email body.
     */
    public function __construct(
        public string $subjectLine,
        public array $lines,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(subject: $this->subjectLine);
    }

    public function content(): Content
    {
        return new Content(view: 'emails.new-lead');
    }
}
