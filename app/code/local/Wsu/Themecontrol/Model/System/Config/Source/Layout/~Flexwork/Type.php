<?php
class Wsu_Themecontrol_Model_System_Config_Source_Layout_Flexwork_Type
{
    public function toOptionArray()
	{
		return [
			['value' => '',       'label' => Mage::helper('wsu_themecontrol')->__('don\'t set type')],
			['value' => 'flex-row',       'label' => Mage::helper('wsu_themecontrol')->__('row')],
			['value' => 'flex-column',    'label' => Mage::helper('wsu_themecontrol')->__('column')],
			['value' => 'row-reverse',    'label' => Mage::helper('wsu_themecontrol')->__('row-reverse')],
			['value' => 'column-reverse', 'label' => Mage::helper('wsu_themecontrol')->__('column-reverse')],
        ];
    }
}
