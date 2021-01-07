<?php

namespace App\Mail\Request;

class OvertimeRequestSubmitted extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->previewUrl = route('mailable.request.submitted', ['overtimeRequest' => $this->request->reference]);
        
        return $this->markdown('emails.request.submitted');
    }
}
