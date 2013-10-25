<?php

class Wsu_ThemeControll_Model_System_Config_Source_Element_Display{
    public function toOptionArray(){
		return array(
			array('value' => 0, 'label' => Mage::helper('themecontroll')->__('Don\'t Display')),
            array('value' => 1, 'label' => Mage::helper('themecontroll')->__('Display On Hover')),
            array('value' => 2, 'label' => Mage::helper('themecontroll')->__('Display'))
        );
    }
}