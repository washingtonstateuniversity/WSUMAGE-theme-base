<?php
namespace Wsu\Themecontrol\Model\System\Config\Source\Design\Color;

class Wsubrand implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray(){
		return array(
			array('value' => 'default', 'label' => __('Default [white]')), //Mage::helper('wsu_themecontrol')->
			array('value' => 'lightest', 'label' => __('Lightest [grey]')),
			array('value' => 'lighter', 'label' => __('Lighter [grey]')),
			array('value' => 'light', 'label' => __('Light [grey]')),
			array('value' => 'gray', 'label' =>__('Gray [grey]')),
			array('value' => 'dark', 'label' =>__('Dark [grey]')),
			array('value' => 'darker', 'label' =>__('Darker [grey]')),
			array('value' => 'darkest', 'label' =>__('Darkest [grey]')),
			array('value' => 'crimson', 'label' =>__('Crimson')),
			array('value' => 'transparent', 'label' =>__('Transparent'))
        );
    }
}

