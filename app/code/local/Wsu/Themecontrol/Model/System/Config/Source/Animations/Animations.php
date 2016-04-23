<?php
class Wsu_Themecontrol_Model_System_Config_Source_Animations_Animations
{
    public function toOptionArray(){
		return [
            ['value' => 'fadeIn',	'label' => 'Fade In'],
            ['value' => 'fadeOut',	'label' => 'Fade Out'],
			['value' => 'fadeInRight',	'label' => 'Fade In From Right'],
			['value' => 'fadeInLeft',	'label' => 'Fade In From Left'],
			['value' => 'fadeInUp',	'label' => 'Fade In Upwards'],
			['value' => 'fadeInDown',	'label' => 'Fade In Downwards'],
        ];
    }
}