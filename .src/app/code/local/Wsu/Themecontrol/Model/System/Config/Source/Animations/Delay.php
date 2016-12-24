<?php
class Wsu_Themecontrol_Model_System_Config_Source_Animations_Delay
{
    public function toOptionArray(){
        $tmp = [];
        $delaylist = ['0.25s', '0.50s', '0.75s', '1s', '1.25s', '1.5s', '1.75s', '2s'];
        
        $tmp[] = ['value' => '',	'label' => 'No Delay'];
        foreach($delaylist as $key=>$time){
            $tmp[] = ['value' => 'delay-'.$key,	'label' => 'Delay by '. $time];
        }
        
		return $tmp;
    }
}