<?php

namespace App\Mail\Request;

class ApprovedMail extends Base
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->previewUrl = route('mailable.request.approved', ['overtimeRequest' => $this->request->reference]);
        
        return $this->markdown('emails.request.approved');
    }
}
