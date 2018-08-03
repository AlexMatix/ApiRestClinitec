<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ServiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $address = 'soporte@clinitec.com';
        $subject = 'Bienvenida a Clinitec.com';
        $DatosSuscipcion = $this->data['DatosSuscipcion'];
        return $this->view('emails.BienvenidaSuscripcion')
                    ->with('DatosUser', $this->data['DatosUser'])
                    ->with('DatosSuscipcion', $this->data['DatosSuscipcion'])
                    ->from($address, "Soporte Clinitec")
                    //->cc($address, $name)
                    //->bcc($address, $name)
                    //->replyTo($address, $name)
                    ->subject($subject);
                    //->with([ 'message' => $this->data['message'] ]);
    }
}
