<?php

namespace Wsu\Themecontrol\Model\System\Config\Source\Header\Toplinks\Break;

class Position implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray() {
		//$help = Mage::helper('wsu_themecontrol');
		return [
			['value' => '',	'label' => __('No Additional Line Break')], //$help->
			['value' => '30',	'label' => __('Before Cart Drop-Down Block')],
			['value' => '31',	'label' => __('After Cart Drop-Down Block')],
			['value' => '32',	'label' => __('Before Compare Block')],
			['value' => '33',	'label' => __('After Compare Block')],
			['value' => '34',	'label' => __('Before Top Links')],
			['value' => '35',	'label' => __('After Top Links')],
		];
	}
}