<?php

namespace Wsu\Themecontrol\Model\System\Config\Source\Spine;

class Social implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray(){
		return array(
			array('value' => 'skip',		'label' => __('skip')), //Mage::helper('wsu_themecontrol')->
			array('value' => 'facebook',	'label' => __('facebook')),
			array('value' => 'twitter',		'label' => __('twitter')),
			array('value' => 'youtube',		'label' => __('youtube')),
			array('value' => 'directory',	'label' => __('directory')),
			array('value' => 'linkedin',	'label' => __('linkedin')),
			array('value' => 'pinterest',	'label' => __('pinterest')),
			array('value' => 'gplus',		'label' => __('gplus')),
			array('value' => 'flickr',		'label' => __('flickr')),
			array('value' => 'tumblr',		'label' => __('tumblr')),
			array('value' => 'custom',		'label' => __('custom..')),
        );
    }
}