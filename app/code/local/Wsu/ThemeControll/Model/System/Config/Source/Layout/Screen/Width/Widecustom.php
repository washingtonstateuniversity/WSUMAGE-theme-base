<?php

class Wsu_ThemeControll_Model_System_Config_Source_Layout_Screen_Width_WideCustom{
    public function toOptionArray(){
		return array(
			array('value' => '960',		'label' => Mage::helper('themecontroll')->__('1024 px')),
			array('value' => '1280',	'label' => Mage::helper('themecontroll')->__('1280 px')),
			array('value' => '1360',	'label' => Mage::helper('themecontroll')->__('1360 px')),
			array('value' => '1440',	'label' => Mage::helper('themecontroll')->__('1440 px')),
			array('value' => '1680',	'label' => Mage::helper('themecontroll')->__('1680 px')),
			array('value' => 'custom',	'label' => Mage::helper('themecontroll')->__('Custom width...'))
        );
    }
}
