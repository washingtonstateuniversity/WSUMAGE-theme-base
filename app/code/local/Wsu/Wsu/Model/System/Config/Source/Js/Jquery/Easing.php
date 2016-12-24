<?php

class Wsu_Wsu_Model_System_Config_Source_Js_Jquery_Easing
{
    public function toOptionArray()
    {
        return array(
            //Ease in-out
            array('value' => 'easeInOutSine',   'label' => Mage::helper('wsu_themecontrol')->__('easeInOutSine')),
            array('value' => 'easeInOutQuad',   'label' => Mage::helper('wsu_themecontrol')->__('easeInOutQuad')),
            array('value' => 'easeInOutCubic',  'label' => Mage::helper('wsu_themecontrol')->__('easeInOutCubic')),
            array('value' => 'easeInOutQuart',  'label' => Mage::helper('wsu_themecontrol')->__('easeInOutQuart')),
            array('value' => 'easeInOutQuint',  'label' => Mage::helper('wsu_themecontrol')->__('easeInOutQuint')),
            array('value' => 'easeInOutExpo',   'label' => Mage::helper('wsu_themecontrol')->__('easeInOutExpo')),
            array('value' => 'easeInOutCirc',   'label' => Mage::helper('wsu_themecontrol')->__('easeInOutCirc')),
            array('value' => 'easeInOutElastic','label' => Mage::helper('wsu_themecontrol')->__('easeInOutElastic')),
            array('value' => 'easeInOutBack',   'label' => Mage::helper('wsu_themecontrol')->__('easeInOutBack')),
            array('value' => 'easeInOutBounce',     'label' => Mage::helper('wsu_themecontrol')->__('easeInOutBounce')),
            //Ease out
            array('value' => 'easeOutSine',         'label' => Mage::helper('wsu_themecontrol')->__('easeOutSine')),
            array('value' => 'easeOutQuad',         'label' => Mage::helper('wsu_themecontrol')->__('easeOutQuad')),
            array('value' => 'easeOutCubic',    'label' => Mage::helper('wsu_themecontrol')->__('easeOutCubic')),
            array('value' => 'easeOutQuart',    'label' => Mage::helper('wsu_themecontrol')->__('easeOutQuart')),
            array('value' => 'easeOutQuint',    'label' => Mage::helper('wsu_themecontrol')->__('easeOutQuint')),
            array('value' => 'easeOutExpo',         'label' => Mage::helper('wsu_themecontrol')->__('easeOutExpo')),
            array('value' => 'easeOutCirc',         'label' => Mage::helper('wsu_themecontrol')->__('easeOutCirc')),
            array('value' => 'easeOutElastic',  'label' => Mage::helper('wsu_themecontrol')->__('easeOutElastic')),
            array('value' => 'easeOutBack',         'label' => Mage::helper('wsu_themecontrol')->__('easeOutBack')),
            array('value' => 'easeOutBounce',   'label' => Mage::helper('wsu_themecontrol')->__('easeOutBounce')),
            //Ease in
            array('value' => 'easeInSine',      'label' => Mage::helper('wsu_themecontrol')->__('easeInSine')),
            array('value' => 'easeInQuad',      'label' => Mage::helper('wsu_themecontrol')->__('easeInQuad')),
            array('value' => 'easeInCubic',         'label' => Mage::helper('wsu_themecontrol')->__('easeInCubic')),
            array('value' => 'easeInQuart',         'label' => Mage::helper('wsu_themecontrol')->__('easeInQuart')),
            array('value' => 'easeInQuint',         'label' => Mage::helper('wsu_themecontrol')->__('easeInQuint')),
            array('value' => 'easeInExpo',      'label' => Mage::helper('wsu_themecontrol')->__('easeInExpo')),
            array('value' => 'easeInCirc',      'label' => Mage::helper('wsu_themecontrol')->__('easeInCirc')),
            array('value' => 'easeInElastic',   'label' => Mage::helper('wsu_themecontrol')->__('easeInElastic')),
            array('value' => 'easeInBack',      'label' => Mage::helper('wsu_themecontrol')->__('easeInBack')),
            array('value' => 'easeInBounce',    'label' => Mage::helper('wsu_themecontrol')->__('easeInBounce')),
            //No easing
            array('value' => 'null',            'label' => Mage::helper('wsu_themecontrol')->__('No easing'))
        );
    }
}
