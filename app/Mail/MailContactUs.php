<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $msg;
    public $sub;
    public $data;
    public $data2;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data2)
    {
        $this->data = $data2;
        // $this->email = $data->email;
        // $this->msg = $data->msg;
        // $this->sub = $data->sub;
        // dd($name.$email.$msg.$sub);
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@gmail.com')
                    ->subject('New Contact Message')
                    ->view('emails.contact')
                    ->with('data',$this->data);
        // dd($this->data);
    }

    
}
