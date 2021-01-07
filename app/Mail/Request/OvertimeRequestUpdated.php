<?php

namespace App\Mail\Request;

class OvertimeRequestUpdated extends OvertimeRequestBase
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
