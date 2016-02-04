<?php
namespace Wsu\Themecontrol\Model\System\Config\Source;

class ReplaceWithBlock implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray(){
		return array(
			array('value' => 0, 'label' => __('Disable Completely')), //Mage::helper('wsu_themecontrol')->
            array('value' => 1, 'label' => __('Don\'t Replace With Static Block')),
            array('value' => 2, 'label' => __('If Empty, Replace With Static Block')),
			array('value' => 3, 'label' => __('Replace With Static Block'))
        );
    }
}