<?php
namespace Wsu\Themecontrol\Model\System\Config\Source\Css\Background;

class Positiony implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray() {
        return array(
            array(
                'value' => 'top',
                'label' => __('top')
            ),
            array(
                'value' => 'center',
                'label' => __('center')
            ),
            array(
                'value' => 'bottom',
                'label' => __('bottom')
            )
        );
    }
}