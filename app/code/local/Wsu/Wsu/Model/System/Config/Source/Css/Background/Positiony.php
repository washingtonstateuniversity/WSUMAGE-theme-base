<?php

class Wsu_Wsu_Model_System_Config_Source_Css_Background_Positiony{
    public function toOptionArray(){
		return array(
			array('value' => 'top',		'label' => Mage::helper('themecontroll')->__('top')),
            array('value' => 'center',	'label' => Mage::helper('themecontroll')->__('center')),
            array('value' => 'bottom',	'label' => Mage::helper('themecontroll')->__('bottom'))
        );
    }
}