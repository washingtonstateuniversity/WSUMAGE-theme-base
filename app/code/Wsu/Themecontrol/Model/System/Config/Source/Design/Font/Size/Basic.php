<?php

namespace Wsu\Themecontrol\Model\System\Config\Source\Design\Font\Size;

class Basic implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray() {
        return array(
            array(
                'value' => '12px',
                'label' => '12 px'
            ),
            array(
                'value' => '13px',
                'label' => '13px'
            ),
            array(
                'value' => '14px',
                'label' => '14px'
            )
        );
    }
}