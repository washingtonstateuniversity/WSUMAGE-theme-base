<?php
class Wsu_Themecontrol_Model_System_Config_Source_Layout_Padding_Flanks
{
    public function toOptionArray()
    {
        return array(
            array('value' => '',            'label' => Mage::helper('wsu_themecontrol')->__('Normal')),
            array('value' => 'narrow',      'label' => Mage::helper('wsu_themecontrol')->__('Narrow')),
            array('value' => 'wide',        'label' => Mage::helper('wsu_themecontrol')->__('Wide')),
        );
    }
}
