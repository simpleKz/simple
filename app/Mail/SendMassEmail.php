<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMassEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $components;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($components)
    {
        $this->components = $components;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $topic = $this->components['topic'];
        $description = $this->components['description'];
        return $this->view('emails.massMail',compact('topic','description'))->subject($topic);
    }
}
