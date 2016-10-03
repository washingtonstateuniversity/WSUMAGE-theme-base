<?php
class Wsu_Themecontrol_Model_System_Config_Source_Layout_Flexwork_Contentalignment
{
    public function toOptionArray()
    {
        return [
			['value' => '',         			'label' => 'select alignment of content'],
            ['value' => 'content-start',        'label' => 'flex-start'],
            ['value' => 'content-end',          'label' => 'flex-end'],
            ['value' => 'content-center',       'label' => 'center'],
            ['value' => 'content-baseline',     'label' => 'baseline'],
            ['value' => 'content-end',          'label' => 'stretch'],
        ];
    }
}
