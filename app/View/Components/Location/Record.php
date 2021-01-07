<?php

namespace App\View\Components\Location;

use Illuminate\View\Component;
use App\Models\Delegate;

class Record extends Component
{
    public $record;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($record = null)
    {
        $this->record = $record;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.location.record');
    }
}
