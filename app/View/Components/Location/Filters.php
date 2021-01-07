<?php

namespace App\View\Components\Location;

use Illuminate\View\Component;
use App\Models\Location;

class Filters extends Component
{
    
    public $locations;
    public $shores;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->locations = Location::locations();
        $this->shores = Location::shores();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.location.filters');
    }
}
