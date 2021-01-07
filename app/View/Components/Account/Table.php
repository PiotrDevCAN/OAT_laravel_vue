<?php

namespace App\View\Components\Account;

use Illuminate\View\Component;

class Table extends Component
{
    /**
     * The table name.
     *
     * @var string
     */
    public $name;
    
    /**
     * The table content.
     *
     * @var string
     */
    public $records;
    
    /**
     * Create the component instance.
     *
     * @param  string  $name
     * @param  string  $records
     * @return void
     */
    public function __construct($name, $records)
    {
        $this->name = $name;
        $this->records = $records;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.account.table');
    }
}
