<?php
class Wsu_ThemeControl_Model_System_Config_Source_Category_Grid_Hovereffect_Below {
    public function toOptionArray() {
		$help = Mage::helper('wsu_themecontrol');
        return array(
            array('value' => '',     'label' => $help->__('')),
			array('value' => '640',  'label' => $help->__('640 px')),
			array('value' => '480',  'label' => $help->__('480 px')),
			array('value' => '320',  'label' => $help->__('320 px')),
        );
    }
}