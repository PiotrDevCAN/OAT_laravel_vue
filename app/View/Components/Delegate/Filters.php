<?php

namespace App\View\Components\Delegate;

use Illuminate\View\Component;
use App\Models\Delegate;

class Filters extends Component
{
    
    public $userIntranets;
    public $delegateIntranets;
    public $delegateNotesIds;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userIntranets = Delegate::userIntranets();
        $this->delegateIntranets = Delegate::delegateIntranets();
        $this->delegateNotesIds = Delegate::delegateNotesids();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.delegate.filters');
    }
}
