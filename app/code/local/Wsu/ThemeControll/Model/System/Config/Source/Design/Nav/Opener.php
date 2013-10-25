<?php
class Wsu_ThemeControll_Model_System_Config_Source_Design_Nav_Opener {
    public function toOptionArray() {
        return array(
            array(
                'value' => 'b',
                'label' => Mage::helper('themecontroll')->__('Black')
            ),
            array(
                'value' => 'w',
                'label' => Mage::helper('themecontroll')->__('White')
            )
        );
    }
}