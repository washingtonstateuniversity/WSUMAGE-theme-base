<?php
namespace Wsu\Themecontrol\Block\Adminhtml\System\Config\Form\Field;

class Tex extends \Magento\Config\Block\System\Config\Form\Field
{
	
    /**
     * Add texture preview
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return String
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element) {

        $html        = ""; //Default HTML
        /*$jsPath      = $this->getJsUrl('wsu/jquery/jquery-1.7.2.min.js');
        //$texPath = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . 'wysiwyg/wsu/wsu_themecontrol/patterns/default/';
        $texPath     = Mage::helper('wsu_themecontrol')->getPatternsUrl();
        //Recreate ID of the background color picker which is related with this pattern
        $bgcPickerId = str_replace('_tex', '_bg_color', $element->getHtmlId());
        //Create ID of the pattern preview box
        $previewId   = $element->getHtmlId() . '-tex-preview';
        if (Mage::registry('jqueryLoaded') == false) {
            $html .= '
			<script type="text/javascript" src="' . $jsPath . '"></script>
			<script type="text/javascript">jQuery.noConflict();</script>
			';
            Mage::register('jqueryLoaded', 1);
        }
        $html .= '
		<br/><div id="' . $previewId . '" style="width:280px; height:160px; margin:10px 0; background-color:transparent;"></div>
		<script type="text/javascript">
			jQuery(function($){
				var tex		= $("#' . $element->getHtmlId() . '");
				var bgc		= $("#' . $bgcPickerId . '");
				var preview	= $("#' . $previewId . '");
				
				preview.css("background-color", bgc.attr("value"));
				
				tex.change(function() {
					preview.css({
						"background-color": bgc.css("background-color"),
						"background-image": "url(' . $texPath . '" + tex.val() + ".png)"
					});
				})
				.change();
			});
		</script>
		';*/
        return parent::_getElementHtml($element) . $html;
    }
}
