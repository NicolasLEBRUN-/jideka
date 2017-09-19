<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageSent extends Mailable
{
    use Queueable, SerializesModels;

    protected $messageData = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messageData)
    {
        $this->messageData = $messageData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.messagesent')
                    ->with([
                        'nom' => $this->messageData['nom'],
                        'email' => $this->messageData['email'],
                        'prereservation' => $this->messageData['prereservation'],
                        'galerie' => $this->messageData['galerie'],
                        'oeuvre' => $this->messageData['oeuvre'],
                        'corps' => $this->messageData['corps'],
                    ]);
    }
}
