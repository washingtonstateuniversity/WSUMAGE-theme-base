<?php
namespace Wsu\Themecontrol\Model\System\Config\Source\Design\Tex;

class Names implements \Magento\Framework\Option\ArrayInterface
{

    public function toOptionArray(){
		return array(
			array('value' => '0', 'label' => __('None')),
			array('value' => '1', 'label' => __('1')),
            array('value' => '2', 'label' => __('2')),
            array('value' => '3', 'label' => __('3')),
			array('value' => '4', 'label' => __('4')),
			array('value' => '5', 'label' => __('5')),
			array('value' => '6', 'label' => __('6')),
			array('value' => '7', 'label' => __('7')),
			array('value' => '8', 'label' => __('8')),
			array('value' => '9', 'label' => __('9')),
			array('value' => '10', 'label' => __('10')),
            array('value' => '11', 'label' => __('11')),
			array('value' => '12', 'label' => __('12')),
			array('value' => '13', 'label' => __('13')),
			array('value' => '14', 'label' => __('14')),
			array('value' => '15', 'label' => __('15')),
			array('value' => '16', 'label' => __('16')),
			
			array('value' => 'white/1', 'label' => __('1 white')),
            array('value' => 'white/2', 'label' => __('2 white')),
            array('value' => 'white/3', 'label' => __('3 white')),
			array('value' => 'white/4', 'label' => __('4 white')),
			array('value' => 'white/5', 'label' => __('5 white')),
			array('value' => 'white/6', 'label' => __('6 white')),
			array('value' => 'white/7', 'label' => __('7 white')),
			array('value' => 'white/8', 'label' => __('8 white')),
			array('value' => 'white/9', 'label' => __('9 white')),
			array('value' => 'white/10', 'label' => __('10 white')),
			
			array('value' => 'custom1', 'label' => __('custom1')),
			array('value' => 'custom2', 'label' => __('custom2')),
			array('value' => 'custom3', 'label' => __('custom3')),
			array('value' => 'custom4', 'label' => __('custom4'))
        );
    }
}