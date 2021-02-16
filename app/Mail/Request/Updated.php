<?php

namespace App\Mail\Request;

class Updated extends Base
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->previewUrl = route('mailable.request.updated', ['overtimeRequest' => $this->request->reference]);
        
        return $this->markdown('emails.request.updated');
    }
}
