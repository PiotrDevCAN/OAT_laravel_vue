<?php

namespace App\View\Components\Log;

use Illuminate\View\Component;
use App\Models\Log;

class Filters extends Component
{
    public $lastUpdates;
    public $lastUpdaters;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->lastUpdates = Log::lastUpdates();
        $this->lastUpdaters = Log::lastUpdaters();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.log.filters');
    }
}
