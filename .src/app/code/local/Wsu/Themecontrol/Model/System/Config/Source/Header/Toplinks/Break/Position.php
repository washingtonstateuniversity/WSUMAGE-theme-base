<?php

class Wsu_Themecontrol_Model_System_Config_Source_Header_Toplinks_Break_Position
{
    public function toOptionArray()
    {
        $help = Mage::helper('wsu_themecontrol');
        return array(
            array('value' => '',    'label' => $help->__('No Additional Line Break')),
            array('value' => '30',  'label' => $help->__('Before Cart Drop-Down Block')),
            array('value' => '31',  'label' => $help->__('After Cart Drop-Down Block')),
            array('value' => '32',  'label' => $help->__('Before Compare Block')),
            array('value' => '33',  'label' => $help->__('After Compare Block')),
            array('value' => '34',  'label' => $help->__('Before Top Links')),
            array('value' => '35',  'label' => $help->__('After Top Links')),
        );
    }
}
