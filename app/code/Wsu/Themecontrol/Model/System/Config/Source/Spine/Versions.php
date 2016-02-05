<?php

namespace Wsu\Themecontrol\Model\System\Config\Source\Spine;

class Versions implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray(){
		return array(
			array('value' => '1',			'label' => __('1.x.x (lastest stable)')), //Mage::helper('wsu_themecontrol')->
			//array('value' => '2',	'label' => __('facebook')),
			array('value' => 'develop',		'label' => __('Beta (development)')),
			['value'=>'custom','label'=>'Custom version point'],
        );
    }
}