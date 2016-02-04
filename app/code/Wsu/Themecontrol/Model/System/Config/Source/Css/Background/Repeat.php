<?php
namespace Wsu\Themecontrol\Model\System\Config\Source\Css\Background;

class Repeat implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray() {
        return array(
            array(
                'value' => 'no-repeat',
                'label' => __('no-repeat') //Mage::helper('wsu_themecontrol')->
            ),
            array(
                'value' => 'repeat',
                'label' => __('repeat')
            ),
            array(
                'value' => 'repeat-x',
                'label' => __('repeat-x')
            ),
            array(
                'value' => 'repeat-y',
                'label' => __('repeat-y')
            )
        );
    }
}