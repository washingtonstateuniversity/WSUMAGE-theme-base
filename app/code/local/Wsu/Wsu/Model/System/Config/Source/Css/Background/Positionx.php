<?php

class Wsu_Wsu_Model_System_Config_Source_Css_Background_Positionx{
    public function toOptionArray(){
		return array(
			array('value' => 'left',	'label' => Mage::helper('themecontroll')->__('left')),
            array('value' => 'center',	'label' => Mage::helper('themecontroll')->__('center')),
            array('value' => 'right',	'label' => Mage::helper('themecontroll')->__('right'))
        );
    }
}