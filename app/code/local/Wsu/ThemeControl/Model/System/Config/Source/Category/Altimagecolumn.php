<?php
class Wsu_ThemeControl_Model_System_Config_Source_Category_AltImageColumn {
    public function toOptionArray() {
        return array(
			array('value' => 'label',			'label' => Mage::helper('wsu_themecontrol')->__('Label')),
            array('value' => 'position',		'label' => Mage::helper('wsu_themecontrol')->__('Sort Order'))
        );
    }
}