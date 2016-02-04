<?php

namespace Wsu\Themecontrol\Model\System\Config\Source\Layout\Rows;

class Type implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray(){
		//'single','halves','thirds','side-left', 'side-right', 'margin-left','margin-right','triptych','quarters','eighths'
		return array(
			array('value' => 'single',			'label' => __('single')), //Mage::helper('wsu_themecontrol')->
			array('value' => 'halves',			'label' => __('halves')),
			array('value' => 'thirds',			'label' => __('thirds')),
			array('value' => 'side-left',		'label' => __('side-left')),
			array('value' => 'side-right',		'label' => __('side-right')),
			array('value' => 'margin-left',		'label' => __('margin-left')),
			array('value' => 'margin-right',	'label' => __('margin-right')),
			array('value' => 'triptych',		'label' => __('triptych')),
			array('value' => 'quarters',		'label' => __('quarters')),
			array('value' => 'eighths',			'label' => __('eighths'))
        );
    }
}
