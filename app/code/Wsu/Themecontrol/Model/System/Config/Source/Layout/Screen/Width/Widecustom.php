<?php
namespace Wsu\Themecontrol\Model\System\Config\Source\Layout\Screen\Width;

class WideCustom implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray(){
		return array(
			array('value' => 'default',		'label' => __('990 px')),//Mage::helper('wsu_themecontrol')->
			array('value' => '1188',	'label' => __('1188 px')),
			array('value' => '1386',	'label' => __('1386 px')),
			array('value' => '1584',	'label' => __('1584 px')),
			array('value' => '1782',	'label' => __('1782 px')),
			array('value' => '1980',	'label' => __('1980 px')),
			array('value' => 'custom',	'label' => __('Custom width...'))
        );
    }
}
