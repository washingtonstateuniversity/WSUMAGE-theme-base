<?php

class Wsu_Wsu_Model_System_Config_Source_Css_Background_Attachment{
    public function toOptionArray(){
		return array(
			array('value' => 'fixed',	'label' => Mage::helper('wsu_themecontrol')->__('fixed')),
            array('value' => 'scroll',	'label' => Mage::helper('wsu_themecontrol')->__('scroll'))
        );
    }
}