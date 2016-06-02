<?php
class Wsu_Themecontrol_Model_System_Config_Source_Layout_Flexwork_Order
{
    public function toOptionArray()
    {
		$tmp = [];
		$sizes = [ "1","2","3","4","5","6","7","8","9","10","11","12" ];
				   
		foreach($sizes as $size){
        	$tmp[] = ['value' => 'order-'.$size, 'label' => 'order-'.$size];
		}

        return $tmp;
    }
}
