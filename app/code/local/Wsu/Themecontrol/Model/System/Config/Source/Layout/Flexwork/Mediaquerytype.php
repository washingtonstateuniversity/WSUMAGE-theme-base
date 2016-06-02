<?php
class Wsu_Themecontrol_Model_System_Config_Source_Layout_Flexwork_Mediaquerytype
{
    public function toOptionArray()
    {
		$tmp = [];
		

		$sizes = [ "100", "150", "200", "250", "300", "320", "350", "400", "450", "480",
				   "500", "550", "600", "650", "700", "750", "768", "800", "850", "900",
				   "950", "1000", "1024", "1050", "1100", "1150", "1200" ];
				   
		foreach($sizes as $size){
        	$tmp[] = ['value' => 'row-at-'.$size, 'label' => 'row-at-'.$size];
			$tmp[] = ['value' => 'row-reverse-at-'.$size, 'label' => 'row-reverse-at-'.$size];
			$tmp[] = ['value' => 'column-at-'.$size, 'label' => 'column-at-'.$size];
			$tmp[] = ['value' => 'column-reverse-at-'.$size, 'label' => 'column-reverse-at-'.$size];
		}

        return $tmp;
    }
}
