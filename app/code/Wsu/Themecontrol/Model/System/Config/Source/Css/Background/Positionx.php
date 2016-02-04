<?php
namespace Wsu\Themecontrol\Model\System\Config\Source\Css\Background;

class Positionx implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray() {
        return array(
            array(
                'value' => 'left',
                'label' => __('left') //Mage::helper('wsu_themecontrol')->
            ),
            array(
                'value' => 'center',
                'label' => __('center')
            ),
            array(
                'value' => 'right',
                'label' => __('right')
            )
        );
    }
}