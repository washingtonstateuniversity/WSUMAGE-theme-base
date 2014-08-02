<?php
class Wsu_ThemeControl_Model_System_Config_Source_Category_Grid_Columncount {
    public function toOptionArray() {
		$help = Mage::helper('wsu_themecontrol');
        return array(
			array('value' => 2, 'label' => $help->__('2')),
			array('value' => 3, 'label' => $help->__('3')),
			array('value' => 4, 'label' => $help->__('4')),
			array('value' => 5, 'label' => $help->__('5')),
			array('value' => 6, 'label' => $help->__('6')),
            array('value' => 7, 'label' => $help->__('7')),
            array('value' => 8, 'label' => $help->__('8')),
        );
    }
}