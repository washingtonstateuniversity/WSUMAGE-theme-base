<?php
class Wsu_Themecontrol_Model_System_Config_Source_Header_Search_Position
{
    public function toOptionArray()
    {
        $help = Mage::helper('wsu_themecontrol');
        return array(
            array('value' => '20',  'label' => $help->__('Central Column')),
            array('value' => '30',  'label' => $help->__('Before Cart Drop-Down Block')),
            array('value' => '31',  'label' => $help->__('Before Compare Block')),
            array('value' => '32',  'label' => $help->__('Before Top Links')),
            array('value' => '33',  'label' => $help->__('After Top Links')),
        );
    }
}
