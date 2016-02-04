<?php

namespace Wsu\Themecontrol\Model\System\Config\Source\Layout\Padding;

class Type implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray(){
		return array(
			array('value' => '',			'label' => __('none')), //Mage::helper('wsu_themecontrol')->
			array('value' => 'pad',			'label' => __('Pad (it\'s child `.column`s)')),
			array('value' => 'padded',		'label' => __('Padded (itself)')),
		);
	}
}
