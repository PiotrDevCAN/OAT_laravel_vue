<?php

namespace App\View\Components\IbmV18Form;

use Illuminate\View\Component;

class Button extends Component
{
    public $classes;
    public $label;
    public $onclick;
    public $disabled;
    public $data;
    public $id;
    
    public static $btnColorWhite    = 'ibm-btn-white';
    public static $btnColorGray     = 'ibm-btn-gray-50';
    public static $btnColorGreen    = 'ibm-btn-green-50';
    public static $btnColorTeal     = 'ibm-btn-teal-50';
    public static $btnColorPurple   = 'ibm-btn-purple-50';
    public static $btnColorMagenta  = 'ibm-btn-magenta-50';
    public static $btnColorRed      = 'ibm-btn-red-50';
    public static $btnColorOrange   = 'ibm-btn-orange-50';
    public static $btnColorBlue     = 'ibm-btn-blue-50';
    public static $btnColorBlack    = 'ibm-btn-black-50';
    
    public static $btnSizeSmall     = 'ibm-btn-small';
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($classes = null, $label = null)
    {
        $this->classes = $classes;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.ibmv18form.button');
    }
}
