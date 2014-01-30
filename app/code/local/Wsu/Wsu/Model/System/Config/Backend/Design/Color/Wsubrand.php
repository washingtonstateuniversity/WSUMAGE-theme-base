<?php

class Wsu_Wsu_Model_System_Config_Source_Design_Color_Wsubrand{
    public function toOptionArray(){
		return array(
			array('value' => 'Default', 'label' => Mage::helper('wsu_themecontrol')->__('Default [white]')),
			array('value' => 'Lightest', 'label' => Mage::helper('wsu_themecontrol')->__('Lightest [grey]')),
			array('value' => 'Lighter', 'label' => Mage::helper('wsu_themecontrol')->__('Lighter [grey]')),
			array('value' => 'Light', 'label' => Mage::helper('wsu_themecontrol')->__('Light [grey]')),
			array('value' => 'Gray', 'label' => Mage::helper('wsu_themecontrol')->__('Gray [grey]')),
			array('value' => 'Dark', 'label' => Mage::helper('wsu_themecontrol')->__('Dark [grey]')),
			array('value' => 'Darker', 'label' => Mage::helper('wsu_themecontrol')->__('Darker [grey]')),
			array('value' => 'Darkest', 'label' => Mage::helper('wsu_themecontrol')->__('Darkest [grey]')),
			array('value' => 'Crimson', 'label' => Mage::helper('wsu_themecontrol')->__('Crimson')),
			array('value' => 'Transparent', 'label' => Mage::helper('wsu_themecontrol')->__('Transparent'))
        );
    }
}

