<?php

namespace App\View\Components\Request;

use Illuminate\View\Component;
use App\Models\OvertimeRequest;

class Summary extends Component
{
    public $lists;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($lists = null)
    {
        $this->lists = $lists;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.request.summary');
    }
}
