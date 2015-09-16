<?php

class Wsu_Themecontrol_Model_System_Config_Source_Navshadow
{
    public function toOptionArray()
    {
        return array(
            array('value' => '',                     'label' => Mage::helper('wsu_themecontrol')->__('None')),
			array('value' => 'inner-container',      'label' => Mage::helper('wsu_themecontrol')->__('Inner container')),
			array('value' => 'bar',                  'label' => Mage::helper('wsu_themecontrol')->__('Menu items')),
        );
    }
}