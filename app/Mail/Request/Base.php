<?php

namespace App\Mail\Request;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\OvertimeRequest;

class Base extends Mailable
{
    use Queueable, SerializesModels;
    
    public $request;
    
    public $requestEditUrl;
    
    public $previewUrl;
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function __construct(OvertimeRequest $overtimeRequest)
    {
        $this->request = $overtimeRequest;
        
        $this->requestEditUrl = route('request.edit', ['overtimeRequest' => $this->request->reference]);
    }
}
