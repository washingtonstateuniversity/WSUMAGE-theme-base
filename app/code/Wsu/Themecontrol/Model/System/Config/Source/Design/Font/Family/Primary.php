<?php
namespace Wsu\Themecontrol\Model\System\Config\Source\Design\Font\Family;

class Primary implements \Magento\Framework\Option\ArrayInterface
{

    public function toOptionArray() {
        return array(
            array(
                'value' => 'Rokkitt',
                'label' => __('Rokkitt') //Mage::helper('wsu_themecontrol')->
            ),
            array(
                'value' => 'Bitter',
                'label' => __('Bitter')
            ),
            array(
                'value' => 'Arvo',
                'label' => __('Arvo')
            ),
            array(
                'value' => 'Lora',
                'label' => __('Lora')
            ),
            array(
                'value' => 'Droid Serif',
                'label' => __('Droid Serif')
            ),
            array(
                'value' => 'Philosopher',
                'label' => __('Philosopher')
            ),
            array(
                'value' => 'Open Sans',
                'label' => __('Open Sans')
            ),
            array(
                'value' => 'Ubuntu',
                'label' => __('Ubuntu')
            ),
            array(
                'value' => 'Lato',
                'label' => __('Lato')
            ),
            array(
                'value' => 'Droid Sans',
                'label' => __('Droid Sans')
            ),
            array(
                'value' => 'Play',
                'label' => __('Play')
            ),
            array(
                'value' => 'Oswald',
                'label' => __('Oswald')
            )
        );
    }
}