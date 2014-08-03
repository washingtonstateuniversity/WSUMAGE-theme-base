<?php

class Wsu_Themecontrol_Model_System_Config_Source_Category_Grid_Size {
	public function toOptionArray() {
		$help = Mage::helper('wsu_themecontrol');
		return array(
			array('value' => '',	'label' => $help->__('Default')),
			array('value' => 's',	'label' => $help->__('Size S')),
			array('value' => 'xs',	'label' => $help->__('Size XS')),
		);
	}
}