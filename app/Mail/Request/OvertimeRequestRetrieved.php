<?php

namespace App\Mail\Request;

class OvertimeRequestRetrieved extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->previewUrl = route('mailable.request.retrieved', ['overtimeRequest' => $this->request->reference]);
        
        return $this->markdown('emails.request.retrieved');
    }
}
