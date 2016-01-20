<?php

namespace Wsu\Themecontrol\Model\System\Config\Source;
 
class Layout_Padding_Ends implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray(){
		return array(
			array('value' => '',			'label' => __('Normal')), //Mage::helper('wsu_themecontrol')->
			array('value' => 'short',		'label' => __('Short')),
			array('value' => 'tall',		'label' => __('Tall')),
		);
	}
}
