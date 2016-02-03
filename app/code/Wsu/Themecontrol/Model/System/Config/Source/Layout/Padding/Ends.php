<?php

namespace Wsu\Themecontrol\Model\System\Config\Source\Layout\Padding;
 
class Ends implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray(){die('Ends');
		return array(
			array('value' => '',			'label' => __('Normal')), //Mage::helper('wsu_themecontrol')->
			array('value' => 'short',		'label' => __('Short')),
			array('value' => 'tall',		'label' => __('Tall')),
		);
	}
}
