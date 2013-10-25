<?php

class Wsu_Wsu_Model_System_Config_Source_Design_Icon_Color{
    public function toOptionArray(){
		return array(
			array('value' => 'b',		'label' => Mage::helper('themecontroll')->__('Black')),
            array('value' => 'w',		'label' => Mage::helper('themecontroll')->__('White'))
        );
    }
}