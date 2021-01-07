

{{ Form:button($value, $options) }}










<?php
namespace itdq;

class Button {
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

    function __construct($classes = null, $label = null){
        $this->classes = 'ibm-btn-pri ' . trim($classes);
        $this->label = trim($label);
        $this->onclick = null;
        $this->disabled = null;
    }

    function setDisabled($disable=true){
        $this->disabled = $disable ? "disabled='disabled'" : null;
    }

    function setId($id=null){
        $this->id = $id ? "id='$id'" : null;
    }

    function setOnclick($onclick=null){
        $this->onclick = $onclick ;
    }


    function setPrimary(){
        $this->stripPriSec();
        $this->classes .= ' ibm-btn-pri ';
    }

    function setSecondary(){
        $this->stripPriSec();
        $this->classes .= ' ibm-btn-sec ';
    }

    function setSize($size=null){
        if(strtolower(trim($size))=='small'){
            $this->stripSize();
            $this->classes .= ' ibm-btn-small ';
        }
    }

    function setColor($color){
        $this->stripColor();
        $color =strtolower(trim($color));
        switch ($color) {
            case self::$btnColorWhite;
            case self::$btnColorGray:
            case self::$btnColorGreen:
            case self::$btnColorTeal:
            case self::$btnColorPurple:
            case self::$btnColorMagenta:
            case self::$btnColorRed:
            case self::$btnColorOrange:
            case self::$btnColorBlue:
            case self::$btnColorBlack:
                $this->classes .= " $color ";
                break;
            default:
                $this->classes .= " " . self::$btnColorBlue . " ";
                break;

            break;
        }
    }

    function setData($data=null){
        $this->data = $data;
    }

    function stripColor(){
       $this->classes =  str_replace(
           array(
               self::$btnColorWhite,
               self::$btnColorGray,
               self::$btnColorGreen,
               self::$btnColorTeal,
               self::$btnColorPurple,
               self::$btnColorMagenta,
               self::$btnColorRed,
               self::$btnColorOrange,
               self::$btnColorBlue,
               self::$btnColorBlack
           ), 
           array(''), 
           $this->classes
       );
    }

    function stripPriSec(){
        $this->classes =  str_replace(array('ibm-btn-pri','ibm-btn-sec'), array(''), $this->classes);
    }

    function stripSize(){
        $this->classes =  str_replace(array('ibm-btn-small'), array(''), $this->classes);
    }

    function getButton(){
        ?>
        <button type="button" <?=$this->id?> <?=$this->data?> <?=$this->disabled?> class="<?=$this->classes?>" onclick="<?=$this->onclick?>" > <?=$this->label?>  </button>
        <?php
    }

    function getButtonAsLink($wrapper = false){
        if ($wrapper === true) {
        ?>
        <p class="ibm-ind-link">
        <?php
        }
        ?>
        	<a  href="javascript:;" <?=$this->id?> <?=$this->data?> <?=$this->disabled?> class="<?=$this->classes?>" onclick="<?=$this->onclick?>"><?=$this->label?></a>
        <?php
        if ($wrapper === true) {
        ?>
        </p>
        <?php
        }
    }
}