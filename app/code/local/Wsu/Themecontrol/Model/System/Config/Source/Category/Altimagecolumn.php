<?php
class Wsu_Themecontrol_Model_System_Config_Source_Category_AltImageColumn {
    public function toOptionArray() {
		$help = Mage::helper('wsu_themecontrol');
        return array(
			array('value' => 'label',			'label' => $help->__('Label')),
            array('value' => 'position',		'label' => $help->__('Sort Order'))
        );
    }
}