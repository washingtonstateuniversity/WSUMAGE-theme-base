<?php

class Wsu_Wsu_Model_System_Config_Source_Layout_Screen_Response_Type{
    public function toOptionArray(){
		return array(
			array('value' => 'fluid',		'label' => Mage::helper('wsu_themecontrol')->__('Fluid')),
			array('value' => 'fixed',		'label' => Mage::helper('wsu_themecontrol')->__('Fixed')),
			array('value' => 'hybrid',		'label' => Mage::helper('wsu_themecontrol')->__('Hybrid')),
        );
    }
}
