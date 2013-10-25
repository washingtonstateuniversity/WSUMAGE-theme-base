<?php
class Wsu_ThemeControll_Model_System_Config_Source_Css_Background_Repeat {
    public function toOptionArray() {
        return array(
            array(
                'value' => 'no-repeat',
                'label' => Mage::helper('themecontroll')->__('no-repeat')
            ),
            array(
                'value' => 'repeat',
                'label' => Mage::helper('themecontroll')->__('repeat')
            ),
            array(
                'value' => 'repeat-x',
                'label' => Mage::helper('themecontroll')->__('repeat-x')
            ),
            array(
                'value' => 'repeat-y',
                'label' => Mage::helper('themecontroll')->__('repeat-y')
            )
        );
    }
}