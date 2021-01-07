<?php

namespace App\View\Components\Log;

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
    
    /**
     * Create the component instance.
     *
     * @param  Collection  $list
     * @return void
     */
    public function __construct($list)
    {
        $this->list = $list;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.log.table');
    }
}
