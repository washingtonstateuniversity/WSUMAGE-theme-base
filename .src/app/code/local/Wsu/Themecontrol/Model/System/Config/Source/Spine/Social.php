<?php
class Wsu_Themecontrol_Model_System_Config_Source_Spine_Social
{
    public function toOptionArray()
    {
        return array(
            array('value' => 'skip',    'label' => Mage::helper('wsu_themecontrol')->__('skip')),
            array('value' => 'facebook',    'label' => Mage::helper('wsu_themecontrol')->__('facebook')),
            array('value' => 'twitter',         'label' => Mage::helper('wsu_themecontrol')->__('twitter')),
            array('value' => 'youtube',         'label' => Mage::helper('wsu_themecontrol')->__('youtube')),
            array('value' => 'directory',   'label' => Mage::helper('wsu_themecontrol')->__('directory')),
            array('value' => 'linkedin',    'label' => Mage::helper('wsu_themecontrol')->__('linkedin')),
            array('value' => 'pinterest',   'label' => Mage::helper('wsu_themecontrol')->__('pinterest')),
            array('value' => 'gplus',       'label' => Mage::helper('wsu_themecontrol')->__('gplus')),
            array('value' => 'flickr',      'label' => Mage::helper('wsu_themecontrol')->__('flickr')),
            array('value' => 'tumblr',      'label' => Mage::helper('wsu_themecontrol')->__('tumblr')),
            array('value' => 'custom',      'label' => Mage::helper('wsu_themecontrol')->__('custom..')),
        );
    }
}
