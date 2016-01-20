<?php

namespace Wsu\Themecontrol\Model\System\Config\Source;
 
class Header_Toplinks_Break_Position implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray() {
		//$help = Mage::helper('wsu_themecontrol');
		return array(
			array('value' => '',	'label' => __('No Additional Line Break')), //$help->
			array('value' => '30',	'label' => __('Before Cart Drop-Down Block')),
			array('value' => '31',	'label' => __('After Cart Drop-Down Block')),
			array('value' => '32',	'label' => __('Before Compare Block')),
			array('value' => '33',	'label' => __('After Compare Block')),
			array('value' => '34',	'label' => __('Before Top Links')),
			array('value' => '35',	'label' => __('After Top Links')),
		);
	}
}