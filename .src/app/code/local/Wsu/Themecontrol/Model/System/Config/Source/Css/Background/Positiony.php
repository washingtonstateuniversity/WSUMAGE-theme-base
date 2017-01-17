<?php
class Wsu_Themecontrol_Model_System_Config_Source_Css_Background_Positiony
{
    public function toOptionArray()
    {
        return array(
            array(
                'value' => 'top',
                'label' => Mage::helper('wsu_themecontrol')->__('top')
            ),
            array(
                'value' => 'center',
                'label' => Mage::helper('wsu_themecontrol')->__('center')
            ),
            array(
                'value' => 'bottom',
                'label' => Mage::helper('wsu_themecontrol')->__('bottom')
            )
        );
    }
}
