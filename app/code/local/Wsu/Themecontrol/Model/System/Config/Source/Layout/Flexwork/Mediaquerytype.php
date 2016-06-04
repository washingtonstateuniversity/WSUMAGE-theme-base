<?php
class Wsu_Themecontrol_Model_System_Config_Source_Layout_Flexwork_Mediaquerytype
{
    public function toOptionArray()
    {
		$tmp = [];
		
		$sizes = [ "100", "125", "150", "175", "200", "225", "250", "275", "300",
		           "320", "325", "350", "360", "375", "390", "400", "425", "450",
				   "475", "480", "500", "525", "550", "575", "600", "625", "640",
				   "650", "675", "700", "725", "736", "750", "768", "775", "800",
				   "825", "850", "875", "900", "925", "950", "960", "975", "1000",
				   "1024", "1050", "1075", "1100", "1125", "1150", "1175", "1200",
				   "1225", "1250", "1275", "1280", "1300", "1325", "1350", "1366",
				   "1375", "1400", "1425", "1440", "1450" ];
				   
		foreach($sizes as $size){
        	$tmp[] = ['value' => 'row-at-'.$size, 'label' => 'row-at-'.$size];
			$tmp[] = ['value' => 'row-reverse-at-'.$size, 'label' => 'row-reverse-at-'.$size];
			$tmp[] = ['value' => 'column-at-'.$size, 'label' => 'column-at-'.$size];
			$tmp[] = ['value' => 'column-reverse-at-'.$size, 'label' => 'column-reverse-at-'.$size];
		}

        return $tmp;
    }
}
