<?php
class Wsu_Themecontrol_Model_System_Config_Source_Layout_Flexwork_Justification
{
    public function toOptionArray()
    {
        return [
            ['value' => '',                 'label' => 'Default Justification'],
            ['value' => 'justify-start',    'label' => 'flex-start'],
            ['value' => 'justify-end',      'label' => 'flex-end'],
            ['value' => 'justify-center',   'label' => 'center'],
            ['value' => 'justify-between',  'label' => 'space-between'],
            ['value' => 'justify-around',   'label' => 'space-around'],
        ];
    }
}
