<?php
class Wsu_Themecontrol_Model_System_Config_Source_Layout_Flexwork_Mediaquerysize
{
    public function toOptionArray()
    {
		$tmp = [];
		

		$sizes = [ "100", "150", "200", "250", "300", "320", "350", "400", "450", "480",
				   "500", "550", "600", "650", "700", "750", "768", "800", "850", "900",
				   "950", "1000", "1024", "1050", "1100", "1150", "1200" ];
				   
		foreach($sizes as $size){
        	$tmp[] = ['value' => 'full-width-at-'.$size, 'label' => 'full-width-at-'.$size];
			/*,.row-at-#{$current-size}{ flex-direction: row; }
			.row-reverse-at-#{$current-size} { flex-direction: row-reverse; }
			.column-at-#{$current-size}  { flex-direction: column; }
			.column-reverse-at-#{$current-size} { flex-direction: column-reverse; }*/
		}

        return $tmp;
    }
}
