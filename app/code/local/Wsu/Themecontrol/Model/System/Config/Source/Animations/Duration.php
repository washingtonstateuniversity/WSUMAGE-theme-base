<?php
class Wsu_Themecontrol_Model_System_Config_Source_Animations_Duration
{
    public function toOptionArray(){
        $tmp = [];
        $durationlist = ['0.25s', '0.50s', '0.75s', '1s', '1.25s', '1.5s', '1.75s', '2s'];

        foreach($durationlist as $key=>$time){
            $tmp[] = ['value' => 'duration-'.$key,	'label' => 'Duration of '. $time];
        }
        
		return $tmp;
    }
}