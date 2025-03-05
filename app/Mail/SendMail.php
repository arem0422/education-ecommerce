<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
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
        return $this->from($this->paramEnvio['emailFrom'],"Sasi")->subject($this->paramEnvio['subject'])
        ->bcc("cco@sasi.cl", "Sasi")
        ->view("email.SasiMail")->with([
            "paramEnvio" => $this->paramEnvio
        ]);
    }
}
