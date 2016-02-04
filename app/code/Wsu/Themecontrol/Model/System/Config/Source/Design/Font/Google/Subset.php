<?php
namespace Wsu\Themecontrol\Model\System\Config\Source\Design\Font\Google;

class Subset implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray()
	{
		return array(
			array('value' => 'cyrillic',			'label' => __('Cyrillic')), //Mage::helper('wsu_themecontrol')->
			array('value' => 'cyrillic-ext',		'label' => __('Cyrillic Extended')),
			array('value' => 'greek',				'label' => __('Greek')),
			array('value' => 'greek-ext',			'label' => __('Greek Extended')),
			array('value' => 'khmer',				'label' => __('Khmer')),
			array('value' => 'latin',				'label' => __('Latin')),
			array('value' => 'latin-ext',			'label' => __('Latin Extended')),
			array('value' => 'vietnamese',			'label' => __('Vietnamese')),
		);
	}
}