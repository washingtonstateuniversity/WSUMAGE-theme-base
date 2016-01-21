<?php

namespace Wsu\Themecontrol\Block\System\Config\Form\Field;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Color extends Mage_Adminhtml_Block_System_Config_Form_Field 
{
    /**
     * Add color picker
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return String
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element) {
        $html = $element->getElementHtml(); //Default HTML
        if (Mage::registry('colorPickerFirstUse') == false) {
            $html .= '
			<script type="text/javascript" src="' . $this->getJsUrl('wsu/jquery/jquery-1.7.2.min.js') . '"></script>
			<script type="text/javascript" src="' . $this->getJsUrl('wsu/jquery/plugins/minicolors/jquery.minicolors.min.js') . '"></script>
			<script type="text/javascript">jQuery.noConflict();</script>
            <link type="text/css" rel="stylesheet" href="' . $this->getJsUrl('wsu/jquery/plugins/minicolors/jquery.minicolors.css') . '" />
            ';
            Mage::register('colorPickerFirstUse', 1);
        }
        $html .= '
			<script type="text/javascript">
				jQuery(function($){
					$("#' . $element->getHtmlId() . '").miniColors();
				});
			</script>
        ';
        return $html;
    }
}
