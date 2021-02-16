<?php

namespace App\Mail\Request;

class Rejected extends Base
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->previewUrl = route('mailable.request.rejected', ['overtimeRequest' => $this->request->reference]);
        
        return $this->markdown('emails.request.rejected');
    }
}
