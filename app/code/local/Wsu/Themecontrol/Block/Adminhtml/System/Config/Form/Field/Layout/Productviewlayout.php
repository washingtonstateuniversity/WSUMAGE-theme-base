<?php
class Wsu_Themecontrol_Block_Adminhtml_System_Config_Form_Field_Layout_Productviewlayout extends Mage_Adminhtml_Block_System_Config_Form_Field {
	
	protected function _makeOptionDropdown($name,$type){
		$types = Mage::getModel('wsu_themecontrol/system_Config_source_layout_flexwork_'.$type)->toOptionArray();
		$html = '<select name="'.$name.'" class="flextype">';
		foreach($types as $option){
			$html .= '<option value="'.$option['value'].'">'.$option['label'].'</option>';
		}
		$html .= '</select>';
		return $html;
	}
	
	
	
	
	
    /**
     * Add texture preview
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return String
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element) {
		$used_values = $this->helper('wsu_themecontrol/layout')
			->getMapBlockMapping(str_replace('.','_',$element->getHtmlId()),$element->getValues());
			
		$element->setHtmlId(str_replace('.','_',$element->getHtmlId()));
		$element->setValues($used_values);
        $html        = $element->getElementHtml(); //Default HTML
		
		$html_id = str_replace('.','_',$element->getHtmlId());
		$html_id_stub = explode('_row_type_',str_replace('.','_',$html_id));
		$html_id_stub = isset($html_id_stub[1])?$html_id_stub[1]:'';
		$url = $this->helper('wsu_themecontrol/layout')->_testProductPage();
		$ajaxurl = Mage::helper("adminhtml")->getUrl("adminhtml/cssgen/previewurl");
        $html .= '
		<br/>
		<style>
			#' . $html_id . '{
				display:none;
			}
			.layoutframeworkPreview{
				min-height: 70px;
				max-width: 100%;
				border: 1px solid #000;
				position: relative;
				box-sizing: border-box;
				max-height: 750px;
				zoom: .50;
			}
		</style>
		<div style="display:none;">
			<div class="type_show"><select><option value="true">yes</option><option value="false">no</option></select></div>
			<div class="type_type">'.$this->_makeOptionDropdown('**type_temp**','type').'</div>
			<div class="type_justification">'.$this->_makeOptionDropdown('**type_temp**','justification').'</div>
			<div class="type_wrap">'.$this->_makeOptionDropdown('**type_temp**','wrap').'</div>
			<div class="type_size">'.$this->_makeOptionDropdown('**type_temp**','size').'</div>
			<div class="type_content_alignment">'.$this->_makeOptionDropdown('**type_temp**','contentalignment').'</select></div>
			<div class="type_item_alignment">'.$this->_makeOptionDropdown('**type_temp**','itemalignment').'</div>
			
			<div class="type_media-query-size">'.$this->_makeOptionDropdown('**type_temp**','mediaquerysize').'</select></div>
			<div class="type_media-query-type">'.$this->_makeOptionDropdown('**type_temp**','mediaquerytype').'</select></div>
			<div class="type_hideat">'.$this->_makeOptionDropdown('**type_temp**','hideat').'</select></div>
			<div class="type_order">'.$this->_makeOptionDropdown('**type_temp**','order').'</div>
		</div>
		<span class="refresh_iframe">Refresh</span>
		<i><b>NOTE:</b> preview is 1:2 and a live page</i><br/>
		
		<iframe 
		class="layoutframeworkPreview '. $html_id .'" 
		name="layoutframeworkPreview_'. $html_id .'" 
		id="layoutframeworkPreview_'. $html_id .'" 
		data-src="'.$url.'" 
		frameborder="0" 
		width="660" 
		height="450"></iframe>

		<script type="text/javascript">
			(function($){
				$.wsu.product_preview.ajaxurl = "'.$ajaxurl.'";
				$.wsu.product_preview.setup("'.$html_id.'");
			}(jQuery));
		</script>
		';
        return $html;
    }
}
