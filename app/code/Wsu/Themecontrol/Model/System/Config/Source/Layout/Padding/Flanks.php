<?php

namespace Wsu\Themecontrol\Model\System\Config\Source;
 
class Layout_Padding_Flanks implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray(){
		return array(
			array('value' => '',			'label' => __('Normal')), //Mage::helper('wsu_themecontrol')->
			array('value' => 'narrow',		'label' => __('Narrow')),
			array('value' => 'wide',		'label' => __('Wide')),
		);
	}
}
