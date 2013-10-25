<?php

class Wsu_ThemeControll_Model_System_Config_Source_Product_Related_Template{
    public function toOptionArray(){
		return array(
			array('value' => 'catalog/product/list/related_tabbed.phtml',
				  'label' => Mage::helper('themecontroll')->__('Slider: Single Product')),
            array('value' => 'catalog/product/list/related_multi.phtml',
				  'label' => Mage::helper('themecontroll')->__('Slider: Multiple Thumbnails')),
        );
    }
}