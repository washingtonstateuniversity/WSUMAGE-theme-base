<?php
class Wsu_Themecontrol_Model_System_Config_Source_Layout_Flexwork_Type
{
    public function toOptionArray()
	{
		return [
			['value' => 'flex-column',    'label' => Mage::helper('wsu_themecontrol')->__('column')],
			['value' => 'flex-row',       'label' => Mage::helper('wsu_themecontrol')->__('row')],
			['value' => 'column-reverse', 'label' => Mage::helper('wsu_themecontrol')->__('column-reverse')],
			['value' => 'row-reverse',    'label' => Mage::helper('wsu_themecontrol')->__('row-reverse')],
        ];
    }
}
