<?php
class Wsu_Themecontrol_Model_System_Config_Source_Layout_Flexwork_Wrap
{
    public function toOptionArray()
	{
		return [
			['value' => '',             'label' => 'don\'t set wrap'],
			['value' => 'wrap',         'label' => 'wrap'],
			['value' => 'nowrap',       'label' => 'nowrap'],
			['value' => 'wrap-reverse', 'label' => 'wrap-reverse'],
        ];
    }
}