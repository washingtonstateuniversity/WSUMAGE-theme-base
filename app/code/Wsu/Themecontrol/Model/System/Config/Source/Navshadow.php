<?php
namespace Wsu\Themecontrol\Model\System\Config\Source;

class Navshadow implements \Magento\Framework\Option\ArrayInterface
{

    public function toOptionArray()
    {
        return array(
            array('value' => '',                     'label' => __('None')), //Mage::helper('wsu_themecontrol')->
			array('value' => 'inner-container',      'label' => __('Inner container')),
			array('value' => 'bar',                  'label' => __('Menu items')),
        );
    }
}