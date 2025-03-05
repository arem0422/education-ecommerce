<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuscribeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $paramEnvio;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($paramEnvio)
    {
        $this->paramEnvio = $paramEnvio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->paramEnvio['emailFrom'],"Sasi")
        ->bcc("cco@sasi.cl", "Sasi")
        ->subject("Suscripcion")
        ->view("email.SuscribeMail",$this->paramEnvio);
    }
}
