<?php

class Wsu_Themecontrol_Model_System_Config_Source_Design_Icon_Color{
    public function toOptionArray(){
		return array(
			array('value' => 'b',		'label' => Mage::helper('wsu_themecontrol')->__('Black')),
            array('value' => 'w',		'label' => Mage::helper('wsu_themecontrol')->__('White'))
        );
    }
}