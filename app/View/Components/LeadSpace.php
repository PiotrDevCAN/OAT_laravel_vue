<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Http\Request;

class LeadSpace extends Component
{
    public $breadcrumbs;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->breadcrumbs = $request->segments();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.lead-space');
    }
}
