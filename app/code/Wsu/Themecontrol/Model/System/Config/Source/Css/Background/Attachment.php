<?php
namespace Wsu\Themecontrol\Model\System\Config\Source\Css\Background;

class Attachment implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray() {
        return array(
            array( 'value' => 'fixed', 'label' => __('fixed') ),//Mage::helper('wsu_themecontrol')->
            array( 'value' => 'scroll', 'label' => __('scroll') )
        );
    }
}