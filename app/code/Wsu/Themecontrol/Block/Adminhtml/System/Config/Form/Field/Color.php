<?php
namespace Wsu\Themecontrol\Block\System\Config\Form\Field;

class Color extends \Magento\Config\Block\System\Config\Form\Field
{

    /**
     * Add color picker
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return String
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element) {
		
        $html   = $this->toHtml(); //Default HTML
        /*$jsPath = $this->getJsUrl('wsu/jquery/jquery-1.7.2.min.js');
        $mcPath = $this->getJsUrl('wsu/jquery/plugins/mcolorpicker/');
        if (Mage::registry('jqueryLoaded') == false) {
            $html .= '
			<script type="text/javascript" src="' . $jsPath . '"></script>
			<script type="text/javascript">jQuery.noConflict();</script>
			';
            Mage::register('jqueryLoaded', 1);
        }
        if (Mage::registry('colorPickerLoaded') == false) {
            $html .= '
			<script type="text/javascript" src="' . $mcPath . 'mcolorpicker.min.js"></script>
			<script type="text/javascript">
				jQuery.fn.mColorPicker.init.replace = false;
				jQuery.fn.mColorPicker.defaults.imageFolder = "' . $mcPath . 'images/";
				jQuery.fn.mColorPicker.init.allowTransparency = true;
				jQuery.fn.mColorPicker.init.showLogo = false;
			</script>
            ';
            Mage::register('colorPickerLoaded', 1);
        }
        $html .= '
			<script type="text/javascript">
				jQuery(function($){
					$("#' . $element->getHtmlId() . '").attr("data-hex", true).width("250px").mColorPicker();
				});
			</script>
        ';*/
        return $html;
    }
}
