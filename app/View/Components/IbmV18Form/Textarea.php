<?php

namespace App\View\Components\IbmV18Form;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $fieldName;
    public $value;
    public $options;
    public $label;
    public $disabled;
    public $labelOptions;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fieldName, $value = null, $label = '', $disabled = false)
    {
        $this->fieldName = $fieldName;
        $this->value = $value;
        $this->options = array(
            'rows' => '20',
            'cols' => '100',
            'class' => 'form-control', 
            'id' => $fieldName,
            'maxLength' => '500',
            'placeholder' => null,
            'disabled' => $disabled
        );
        $this->label = $label;
        $this->labelOptions = array(
            'class' => 'ibm-column-field-label ibm-bold'
        );
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.ibmv18form.textarea');
    }
}
