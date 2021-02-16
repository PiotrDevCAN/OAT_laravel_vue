<?php

namespace App\Mail\Index;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Entered extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function __construct()
    {
        //
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.index.entered');
    }
}
