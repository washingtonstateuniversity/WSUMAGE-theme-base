<?php

class Wsu_ThemeControl_Model_System_Config_Source_Product_Related_Position{
    public function toOptionArray(){
		return array(
			array('value' => '10',	'label' => Mage::helper('wsu_themecontrol')->__('Top of the Secondary Column (below brand logo)')),
			array('value' => '11',	'label' => Mage::helper('wsu_themecontrol')->__('Bottom of the Secondary Column')),
			array('value' => '20',	'label' => Mage::helper('wsu_themecontrol')->__('At the side of the tabs')),
        );
    }
}