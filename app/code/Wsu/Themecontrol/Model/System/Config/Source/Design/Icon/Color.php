<?php
namespace Wsu\Themecontrol\Model\System\Config\Source\Design\Icon;

class Color implements \Magento\Framework\Option\ArrayInterface
{

    public function toOptionArray(){
		return array(
			array('value' => 'b',		'label' => __('Black')), //Mage::helper('wsu_themecontrol')->
            array('value' => 'w',		'label' => __('White'))
        );
    }
}