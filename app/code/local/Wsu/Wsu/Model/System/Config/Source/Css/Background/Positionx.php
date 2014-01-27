<?php

class Wsu_Wsu_Model_System_Config_Source_Css_Background_Positionx{
    public function toOptionArray(){
		return array(
			array('value' => 'left',	'label' => Mage::helper('wsu_themecontrol')->__('left')),
            array('value' => 'center',	'label' => Mage::helper('wsu_themecontrol')->__('center')),
            array('value' => 'right',	'label' => Mage::helper('wsu_themecontrol')->__('right'))
        );
    }
}