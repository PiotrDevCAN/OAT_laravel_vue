<?php

namespace App\Mail\Request;

class CreatedMail extends Base
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->previewUrl = route('mailable.request.created', ['overtimeRequest' => $this->request->reference]);
        
        return $this->markdown('emails.request.created');
    }
}
