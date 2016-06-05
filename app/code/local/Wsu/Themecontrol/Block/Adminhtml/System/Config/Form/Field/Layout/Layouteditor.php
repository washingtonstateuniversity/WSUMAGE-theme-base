<?php
class Wsu_Themecontrol_Block_Adminhtml_System_Config_Form_Field_Layout_Layouteditor extends Mage_Adminhtml_Block_System_Config_Form_Field {
	
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

		$store = Mage::app()->getRequest()->getParam('store');
		$element->setHtmlId(str_replace('.','_',$element->getHtmlId()));
		$element->setValues($used_values);
        $html        = $element->getElementHtml(); //Default HTML

		$html_id = str_replace('.','_',$element->getHtmlId());

		$url = "";
		$type = "productview";
		if( false !== strpos($html_id,'productview') ){
			$type = "productview";
			$url = $this->helper('wsu_themecontrol/layout')->_testProductPage($store);
		}

		if( false !== strpos($html_id,'productlist') ){
			$type = "productlist";
			$url = $this->helper('wsu_themecontrol/layout')->_testCategoryPage($store);
		}

		$ajaxurl = Mage::helper("adminhtml")->getUrl("adminhtml/cssgen/previewurl",['_query' => 'type='.$type]);
        $html .= '
		<br/>
		<style>
			#' . $html_id . '{ display:none; }
			iframe#layoutframeworkPreview_' . $html_id . ' {
				background-image: url(\'data:image/svg+xml;utf8,<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 439.29 115.19"><path d="M237.55,546.44l17.09-80.85h21.62L262.93,528.8h26.38l-3.76,17.64h-48Z" transform="translate(-237.55 -458.46)"/><path d="M324.15,547.55q-11.56,0-17.83-6.25T300,523.44a48.82,48.82,0,0,1,4.4-21,34.34,34.34,0,0,1,12.36-14.57,33.22,33.22,0,0,1,18.58-5.2q11.56,0,17.83,6.25t6.28,17.86a48.82,48.82,0,0,1-4.4,21,34.33,34.33,0,0,1-12.36,14.57A33.22,33.22,0,0,1,324.15,547.55Zm8.74-48.77q-4.54,0-7.77,7.71a45.35,45.35,0,0,0-3.23,17.67q0,7.35,4.65,7.35,4.48,0,7.8-7.69a44.3,44.3,0,0,0,3.32-17.7,9.75,9.75,0,0,0-1.27-5.5A4,4,0,0,0,332.88,498.77Z" transform="translate(-237.55 -458.46)"/><path d="M418.37,546.44H401.29l0.55-6.8H401.4a18.89,18.89,0,0,1-6.69,6.11,17.94,17.94,0,0,1-8.13,1.8q-8.74,0-13.27-6.17t-4.53-17.72a55,55,0,0,1,4-20.18q4-10.29,10.2-15.54a20.53,20.53,0,0,1,13.63-5.25,15.89,15.89,0,0,1,8.18,2.07,18.37,18.37,0,0,1,6.3,6.77h0.44l2.93-7.74h17.14Zm-23-16.09q2.76,0,5.28-3.24a24.7,24.7,0,0,0,4-8.65,39.86,39.86,0,0,0,1.49-10.62,12.86,12.86,0,0,0-1.11-5.78,3.62,3.62,0,0,0-3.43-2.18q-4.2,0-7.6,7a35.13,35.13,0,0,0-3.4,15.57Q390.61,530.35,395.37,530.35Z" transform="translate(-237.55 -458.46)"/><path d="M465.26,482.68a13.37,13.37,0,0,1,7,1.69q2.82,1.69,6.14,6.72h0.44l0.11-2a73.49,73.49,0,0,1,1.38-12l3.43-16.64h21.62l-18.25,86H470l0.55-6.8h-0.44a19.27,19.27,0,0,1-6.64,6.14,17.85,17.85,0,0,1-8.18,1.77q-8.74,0-13.27-6.17t-4.53-17.72a55.45,55.45,0,0,1,4-20.07q4-10.23,10.15-15.57A20.46,20.46,0,0,1,465.26,482.68Zm-1.16,47.67q2.76,0,5.28-3.24a24.7,24.7,0,0,0,4-8.65,39.86,39.86,0,0,0,1.49-10.62q0-8-4.42-8-2.71,0-5.31,3.26a25.45,25.45,0,0,0-4.2,8.6,37,37,0,0,0-1.6,10.7Q459.35,530.35,464.1,530.35Z" transform="translate(-237.55 -458.46)"/><path d="M523.94,546.44h-21.4l13.22-62.65h21.51ZM518.35,470q0-5.69,3.29-8.63t9.21-2.93q5,0,7.77,2a6.75,6.75,0,0,1,2.74,5.78q0,5.53-3.21,8.54t-9.23,3Q518.35,477.82,518.35,470Z" transform="translate(-237.55 -458.46)"/><path d="M581.56,504.42a4.78,4.78,0,0,0-1.22-3.57,4,4,0,0,0-2.93-1.19q-3.15,0-5.83,3.93t-4.4,12.28l-6.42,30.58h-21.4l13.22-62.65h17.09L569,492.53h0.44a19.46,19.46,0,0,1,7.16-7.55,20.48,20.48,0,0,1,10.09-2.29q7.8,0,12.17,4.73t4.37,13.08a63.84,63.84,0,0,1-1.38,12.66l-7,33.29h-21.4l7.13-34.17A35.19,35.19,0,0,0,581.56,504.42Z" transform="translate(-237.55 -458.46)"/><path d="M676.83,483.79l-2.27,11.45-8.85,2.88a21.63,21.63,0,0,1,.55,5.2q0,10.56-7.19,17.06t-18.75,6.5a26.91,26.91,0,0,1-6.86-.72,14,14,0,0,0-1.88,1.22,2,2,0,0,0-.77,1.66q0,2.38,6.14,3.26l7.58,1q9.62,1.38,13.82,5.06t4.2,10.48q0,11.89-9.32,18.36t-26.46,6.47q-11.72,0-18.66-4.17t-6.94-11.58a13,13,0,0,1,3.76-9.34q3.76-3.93,11.72-6.53a10.45,10.45,0,0,1-3.35-3.32,8,8,0,0,1-1.3-4.37,10,10,0,0,1,2.82-7,26.18,26.18,0,0,1,8.41-5.58q-7.24-5.7-7.24-15.54,0-10.84,7.52-17.2t20.35-6.36a56.38,56.38,0,0,1,5.94.33,39.82,39.82,0,0,1,4.95.77h22.06Zm-57.4,71.06q0,4.75,9.4,4.76,6.91,0,10.53-1.6t3.62-4.53a3.27,3.27,0,0,0-1.82-3,18.19,18.19,0,0,0-6.36-1.52l-6.36-.66a15,15,0,0,0-6.66,2.29A5.08,5.08,0,0,0,619.44,554.85Zm16.76-46.67q0,5.2,3.71,5.2,2.87,0,4.73-3.79a19.72,19.72,0,0,0,1.85-8.76q0-5.25-3.37-5.25a4.63,4.63,0,0,0-3.65,1.85,13.07,13.07,0,0,0-2.41,4.84A21.36,21.36,0,0,0,636.19,508.18Z" transform="translate(-237.55 -458.46)"/></svg>\');
				background-repeat: no-repeat;
				background-size: 25%;
				background-position: center;
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
				
				var editor_'.$html_id.' = new $.wsu.editor_preview();
					editor_'.$html_id.'.type = "'.$type.'";
					editor_'.$html_id.'.ajaxurl = "'.$ajaxurl.'";
					editor_'.$html_id.'.setup("'.$html_id.'");
				
			}(jQuery));
		</script>
		';
        return $html;
    }
}
