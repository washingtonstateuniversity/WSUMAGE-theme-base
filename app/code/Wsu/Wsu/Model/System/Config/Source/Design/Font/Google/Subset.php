<?php

class Wsu_Wsu_Model_System_Config_Source_Design_Font_Google_Subset
{
	public function toOptionArray()
	{
		return array(
			array('value' => 'cyrillic',			'label' => Mage::helper('wsu_themecontrol')->__('Cyrillic')),
			array('value' => 'cyrillic-ext',		'label' => Mage::helper('wsu_themecontrol')->__('Cyrillic Extended')),
			array('value' => 'greek',				'label' => Mage::helper('wsu_themecontrol')->__('Greek')),
			array('value' => 'greek-ext',			'label' => Mage::helper('wsu_themecontrol')->__('Greek Extended')),
			array('value' => 'khmer',				'label' => Mage::helper('wsu_themecontrol')->__('Khmer')),
			array('value' => 'latin',				'label' => Mage::helper('wsu_themecontrol')->__('Latin')),
			array('value' => 'latin-ext',			'label' => Mage::helper('wsu_themecontrol')->__('Latin Extended')),
			array('value' => 'vietnamese',			'label' => Mage::helper('wsu_themecontrol')->__('Vietnamese')),
		);
	}
}