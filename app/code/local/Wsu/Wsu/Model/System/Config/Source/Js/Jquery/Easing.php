<?php

class Wsu_Wsu_Model_System_Config_Source_Js_Jquery_Easing{
    public function toOptionArray(){
        return array(
			//Ease in-out
			array('value' => 'easeInOutSine',	'label' => Mage::helper('themecontroll')->__('easeInOutSine')),
			array('value' => 'easeInOutQuad',	'label' => Mage::helper('themecontroll')->__('easeInOutQuad')),
			array('value' => 'easeInOutCubic',	'label' => Mage::helper('themecontroll')->__('easeInOutCubic')),
			array('value' => 'easeInOutQuart',	'label' => Mage::helper('themecontroll')->__('easeInOutQuart')),
			array('value' => 'easeInOutQuint',	'label' => Mage::helper('themecontroll')->__('easeInOutQuint')),
			array('value' => 'easeInOutExpo',	'label' => Mage::helper('themecontroll')->__('easeInOutExpo')),
			array('value' => 'easeInOutCirc',	'label' => Mage::helper('themecontroll')->__('easeInOutCirc')),
			array('value' => 'easeInOutElastic','label' => Mage::helper('themecontroll')->__('easeInOutElastic')),
			array('value' => 'easeInOutBack',	'label' => Mage::helper('themecontroll')->__('easeInOutBack')),
			array('value' => 'easeInOutBounce',	'label' => Mage::helper('themecontroll')->__('easeInOutBounce')),
			//Ease out
			array('value' => 'easeOutSine',		'label' => Mage::helper('themecontroll')->__('easeOutSine')),
			array('value' => 'easeOutQuad',		'label' => Mage::helper('themecontroll')->__('easeOutQuad')),
			array('value' => 'easeOutCubic',	'label' => Mage::helper('themecontroll')->__('easeOutCubic')),
			array('value' => 'easeOutQuart',	'label' => Mage::helper('themecontroll')->__('easeOutQuart')),
			array('value' => 'easeOutQuint',	'label' => Mage::helper('themecontroll')->__('easeOutQuint')),
			array('value' => 'easeOutExpo',		'label' => Mage::helper('themecontroll')->__('easeOutExpo')),
			array('value' => 'easeOutCirc',		'label' => Mage::helper('themecontroll')->__('easeOutCirc')),
			array('value' => 'easeOutElastic',	'label' => Mage::helper('themecontroll')->__('easeOutElastic')),
			array('value' => 'easeOutBack',		'label' => Mage::helper('themecontroll')->__('easeOutBack')),
			array('value' => 'easeOutBounce',	'label' => Mage::helper('themecontroll')->__('easeOutBounce')),
			//Ease in
			array('value' => 'easeInSine',		'label' => Mage::helper('themecontroll')->__('easeInSine')),
			array('value' => 'easeInQuad',		'label' => Mage::helper('themecontroll')->__('easeInQuad')),
			array('value' => 'easeInCubic',		'label' => Mage::helper('themecontroll')->__('easeInCubic')),
			array('value' => 'easeInQuart',		'label' => Mage::helper('themecontroll')->__('easeInQuart')),
			array('value' => 'easeInQuint',		'label' => Mage::helper('themecontroll')->__('easeInQuint')),
			array('value' => 'easeInExpo',		'label' => Mage::helper('themecontroll')->__('easeInExpo')),
			array('value' => 'easeInCirc',		'label' => Mage::helper('themecontroll')->__('easeInCirc')),
			array('value' => 'easeInElastic',	'label' => Mage::helper('themecontroll')->__('easeInElastic')),
			array('value' => 'easeInBack',		'label' => Mage::helper('themecontroll')->__('easeInBack')),
			array('value' => 'easeInBounce',	'label' => Mage::helper('themecontroll')->__('easeInBounce')),
			//No easing
			array('value' => 'null',			'label' => Mage::helper('themecontroll')->__('No easing'))
        );
    }
}
