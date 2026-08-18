<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnnouncementMail extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;
    public $songInfo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($participant, $songInfo)
    {
        $this->participant = $participant;
        $this->songInfo = $songInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mighty One 2026: Informasi Lagu Pilihan Kategori Anda!')
                    ->view('emails.announcement');
    }
}