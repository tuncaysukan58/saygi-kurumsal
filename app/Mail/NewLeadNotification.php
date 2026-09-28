<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Mail;

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

    /**
     * @param  array<string, string|null>  $lines
     */
    public static function sendToAdmin(string $subject, array $lines, ?string $replyTo = null): void
    {
        $to = config('mail.form_notify_to') ?: Setting::current()->email;

        if (! $to) {
            return;
        }

        $mail = new self($subject, $lines);
        if ($replyTo && filter_var($replyTo, FILTER_VALIDATE_EMAIL)) {
            $mail->replyTo($replyTo);
        }

        // The submission is already saved; a broken SMTP config must not show the visitor an error.
        try {
            Mail::to($to)->send($mail);
        } catch (\Throwable $e) {
            report($e);
        }
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
