<?php

class Wsu_Themecontrol_Model_System_Config_Source_Category_Grid_Columncountmobile
{
    public function toOptionArray()
    {
        $help = Mage::helper('wsu_themecontrol');
        return array(
            array('value' => 1, 'label' => $help->__('1')),
            array('value' => 2, 'label' => $help->__('2')),
            array('value' => 3, 'label' => $help->__('3')),
        );
    }
}
