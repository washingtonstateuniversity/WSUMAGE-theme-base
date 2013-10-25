<?php
class Wsu_ThemeControll_Model_System_Config_Source_Design_Font_Size_Basic {
    public function toOptionArray() {
        return array(
            array(
                'value' => '12px',
                'label' => Mage::helper('themecontroll')->__('12 px')
            ),
            array(
                'value' => '13px',
                'label' => Mage::helper('themecontroll')->__('13 px')
            ),
            array(
                'value' => '14px',
                'label' => Mage::helper('themecontroll')->__('14 px')
            )
        );
    }
}