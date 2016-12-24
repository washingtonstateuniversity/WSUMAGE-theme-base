<?php

class Wsu_Themecontrol_Model_System_Config_Source_Nav_ColumnCount{
    public function toOptionArray(){
        return array(
			array('value' => 4, 'label' => Mage::helper('wsu_themecontrol')->__('4 Columns')),
            array('value' => 5, 'label' => Mage::helper('wsu_themecontrol')->__('5 Columns')),
			array('value' => 6, 'label' => Mage::helper('wsu_themecontrol')->__('6 Columns')),
			array('value' => 7, 'label' => Mage::helper('wsu_themecontrol')->__('7 Columns')),
			array('value' => 8, 'label' => Mage::helper('wsu_themecontrol')->__('8 Columns'))
        );
    }
}