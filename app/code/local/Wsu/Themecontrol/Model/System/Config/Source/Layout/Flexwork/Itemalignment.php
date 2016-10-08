<?php
class Wsu_Themecontrol_Model_System_Config_Source_Layout_Flexwork_Itemalignment
{
    public function toOptionArray()
    {
        return [
			['value' => '',         		'label' => 'select alignment of items'],
            ['value' => 'items-start',      'label' => 'flex-start'],
            ['value' => 'items-end',        'label' => 'flex-end'],
            ['value' => 'items-center',     'label' => 'center'],
            ['value' => 'items-baseline',   'label' => 'baseline'],
            ['value' => 'items-end',        'label' => 'stretch'],

        ];
    }
}
