<?php
class Wsu_Themecontrol_Model_System_Config_Source_Layout_Padding_Type
{
    public function toOptionArray()
    {
        return array(
            array('value' => '',            'label' => Mage::helper('wsu_themecontrol')->__('none')),
            array('value' => 'pad',             'label' => Mage::helper('wsu_themecontrol')->__('Pad (it\'s child `.column`s)')),
            array('value' => 'padded',      'label' => Mage::helper('wsu_themecontrol')->__('Padded (itself)')),
        );
    }
}
