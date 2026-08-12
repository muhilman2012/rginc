<?php

namespace App\Mail;

use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class RegistrationSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;
    public $participantCode;

    public function __construct(Participant $participant, $participantCode)
    {
        $this->participant = $participant;
        $this->participantCode = $participantCode;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pendaftaran Berhasil! - MIGHTY ONE! (M81)',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.registration_success',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}