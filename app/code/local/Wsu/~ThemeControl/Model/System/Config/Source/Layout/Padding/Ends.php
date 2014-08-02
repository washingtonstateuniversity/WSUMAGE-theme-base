<?php
class Wsu_ThemeControl_Model_System_Config_Source_Layout_Padding_Ends{
    public function toOptionArray(){
		return array(
			array('value' => '',			'label' => Mage::helper('wsu_themecontrol')->__('Normal')),
			array('value' => 'short',		'label' => Mage::helper('wsu_themecontrol')->__('Short')),
			array('value' => 'tall',		'label' => Mage::helper('wsu_themecontrol')->__('Tall')),
        );
    }
}
