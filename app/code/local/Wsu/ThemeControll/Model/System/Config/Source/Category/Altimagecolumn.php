<?php

class Wsu_ThemeControll_Model_System_Config_Source_Category_AltImageColumn
{
    public function toOptionArray()
    {
        return array(
			array('value' => 'label',			'label' => Mage::helper('themecontroll')->__('Label')),
            array('value' => 'position',		'label' => Mage::helper('themecontroll')->__('Sort Order'))
        );
    }
}