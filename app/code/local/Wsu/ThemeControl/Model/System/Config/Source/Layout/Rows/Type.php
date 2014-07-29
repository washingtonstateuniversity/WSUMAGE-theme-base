<?php
class Wsu_ThemeControl_Model_System_Config_Source_Layout_Rows_Type{
    public function toOptionArray(){
		//'single','halves','thirds','side-left', 'side-right', 'margin-left','margin-right','triptych','quarters','eighths'
		return array(
			array('value' => 'single',			'label' => Mage::helper('wsu_themecontrol')->__('single')),
			array('value' => 'halves',			'label' => Mage::helper('wsu_themecontrol')->__('halves')),
			array('value' => 'thirds',			'label' => Mage::helper('wsu_themecontrol')->__('thirds')),
			array('value' => 'side-left',		'label' => Mage::helper('wsu_themecontrol')->__('side-left')),
			array('value' => 'side-right',		'label' => Mage::helper('wsu_themecontrol')->__('side-right')),
			array('value' => 'margin-left',		'label' => Mage::helper('wsu_themecontrol')->__('margin-left')),
			array('value' => 'margin-right',	'label' => Mage::helper('wsu_themecontrol')->__('margin-right')),
			array('value' => 'triptych',		'label' => Mage::helper('wsu_themecontrol')->__('triptych')),
			array('value' => 'quarters',		'label' => Mage::helper('wsu_themecontrol')->__('quarters')),
			array('value' => 'eighths',			'label' => Mage::helper('wsu_themecontrol')->__('eighths'))
        );
    }
}
