<?php

namespace App\View\Components\Request;

use Illuminate\View\Component;
use Illuminate\Support\Collection;

class Table extends Component
{
    /**
     * The table.
     *
     * @var array
     */
    public $list;
    
    public $expand;
    
    /**
     * Create the component instance.
     *
     * @param  Collection  $list
     * @param  boolean  $expand
     * @return void
     */
    public function __construct($list = null, $expand = false)
    {
        $this->list = $list;
        $this->expand = $expand;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.request.table');
    }
}
