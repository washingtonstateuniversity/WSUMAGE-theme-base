<?php

class Wsu_Themecontrol_Model_System_Config_Source_Design_Color_Wsubrand{
    public function toOptionArray(){
		return array(
			array('value' => 'default', 'label' => Mage::helper('wsu_themecontrol')->__('Default [white]')),
			array('value' => 'lightest', 'label' => Mage::helper('wsu_themecontrol')->__('Lightest [grey]')),
			array('value' => 'lighter', 'label' => Mage::helper('wsu_themecontrol')->__('Lighter [grey]')),
			array('value' => 'light', 'label' => Mage::helper('wsu_themecontrol')->__('Light [grey]')),
			array('value' => 'gray', 'label' => Mage::helper('wsu_themecontrol')->__('Gray [grey]')),
			array('value' => 'dark', 'label' => Mage::helper('wsu_themecontrol')->__('Dark [grey]')),
			array('value' => 'darker', 'label' => Mage::helper('wsu_themecontrol')->__('Darker [grey]')),
			array('value' => 'darkest', 'label' => Mage::helper('wsu_themecontrol')->__('Darkest [grey]')),
			array('value' => 'crimson', 'label' => Mage::helper('wsu_themecontrol')->__('Crimson')),
			array('value' => 'transparent', 'label' => Mage::helper('wsu_themecontrol')->__('Transparent'))
        );
    }
}

