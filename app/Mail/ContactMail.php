<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $bericht;
    public $email;
    public $onderwerp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bericht, $email, $onderwerp)
    {
        $this->bericht = $bericht;
        $this->email = $email;
        $this->onderwerp = $onderwerp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
            ->subject($this->onderwerp)
            ->markdown('emails.contact', [
            'bericht' => $this->bericht
        ]);
    }
}
