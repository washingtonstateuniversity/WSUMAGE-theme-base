<?php
class Wsu_ThemeControl_Model_System_Config_Source_Layout_Screen_Width_WideCustom{
    public function toOptionArray(){
		return array(
			array('value' => 'default',		'label' => Mage::helper('wsu_themecontrol')->__('990 px')),
			array('value' => '1188',	'label' => Mage::helper('wsu_themecontrol')->__('1188 px')),
			array('value' => '1386',	'label' => Mage::helper('wsu_themecontrol')->__('1386 px')),
			array('value' => '1584',	'label' => Mage::helper('wsu_themecontrol')->__('1584 px')),
			array('value' => '1782',	'label' => Mage::helper('wsu_themecontrol')->__('1782 px')),
			array('value' => '1980',	'label' => Mage::helper('wsu_themecontrol')->__('1980 px')),
			array('value' => 'custom',	'label' => Mage::helper('wsu_themecontrol')->__('Custom width...'))
        );
    }
}
