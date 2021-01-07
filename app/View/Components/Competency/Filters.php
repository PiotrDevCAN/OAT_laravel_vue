<?php

namespace App\View\Components\Competency;

use Illuminate\View\Component;
use App\Models\Competency;

class Filters extends Component
{
    
    public $competencies;
    public $approvers;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->competencies = Competency::competencies();
        $this->approvers = Competency::approvers();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.competency.filters');
    }
}
