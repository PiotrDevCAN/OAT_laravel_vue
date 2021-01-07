<?php

namespace App\Mail\Request;

class OvertimeRequestFlowChanged extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->previewUrl = route('mailable.request.flowChanged', ['overtimeRequest' => $this->request->reference]);
        
        return $this->markdown('emails.request.flowChanged');
    }
}
