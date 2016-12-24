<?php
class Wsu_Themecontrol_Model_System_Config_Source_Css_Background_Repeat {
    public function toOptionArray() {
        return array(
            array(
                'value' => 'no-repeat',
                'label' => Mage::helper('wsu_themecontrol')->__('no-repeat')
            ),
            array(
                'value' => 'repeat',
                'label' => Mage::helper('wsu_themecontrol')->__('repeat')
            ),
            array(
                'value' => 'repeat-x',
                'label' => Mage::helper('wsu_themecontrol')->__('repeat-x')
            ),
            array(
                'value' => 'repeat-y',
                'label' => Mage::helper('wsu_themecontrol')->__('repeat-y')
            )
        );
    }
}