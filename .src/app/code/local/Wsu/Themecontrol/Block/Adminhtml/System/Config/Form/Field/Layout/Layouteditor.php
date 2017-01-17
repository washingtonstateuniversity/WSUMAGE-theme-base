<?php
class Wsu_Themecontrol_Block_Adminhtml_System_Config_Form_Field_Layout_Layouteditor extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    
    protected function _makeOptionDropdown($name, $type)
    {
        $types = Mage::getModel('wsu_themecontrol/system_config_source_layout_flexwork_'.$type)->toOptionArray();
        $html = '<select name="'.$name.'" class="flextype">';
        foreach ($types as $option) {
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
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $used_values = $this->helper('wsu_themecontrol/layout')
            ->getMapBlockMapping(str_replace('.', '_', $element->getHtmlId()), $element->getValues());

        $store = Mage::app()->getRequest()->getParam('store');
        $element->setHtmlId(str_replace('.', '_', $element->getHtmlId()));
        $element->setValues($used_values);
        $html        = $element->getElementHtml(); //Default HTML

        $html_id = str_replace('.', '_', $element->getHtmlId());

        $url = "";
        $type = "productview";
        if (false !== strpos($html_id, 'productview')) {
            $type = "productview";
            $url = $this->helper('wsu_themecontrol/layout')->_testProductPage($store);
        }

        if (false !== strpos($html_id, 'productlist')) {
            $type = "productlist";
            $url = $this->helper('wsu_themecontrol/layout')->_testCategoryPage($store);
        }
        
        if (false !== strpos($html_id, 'customeraccountareas')) {
            $type = "customeraccountareas";
            $url = Mage::getUrl('customer/account/login');
        }

        $ajaxurl = Mage::helper("adminhtml")->getUrl("adminhtml/cssgen/previewurl", ['_query' => 'type='.$type]);
        $html .= '
        <br/>
        <style>
			#' . $html_id . '{ display:none; }
			iframe#layoutframeworkPreview_' . $html_id . ' {
                background-image: url(\'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 564.4 148"><title>Untitled-1</title><path d="M255.6,512l22-103.9h27.8l-17.1,81.2h33.9L317.3,512H255.6Z" transform="translate(-255.6 -399)"/><path d="M366.9,513.4q-14.8,0-22.9-8t-8.1-22.9a62.7,62.7,0,0,1,5.6-27,44.1,44.1,0,0,1,15.9-18.7q10.2-6.7,23.9-6.7t22.9,8q8.1,8,8.1,22.9a62.7,62.7,0,0,1-5.6,27,44.1,44.1,0,0,1-15.9,18.7Q380.5,513.4,366.9,513.4Zm11.2-62.7q-5.8,0-10,9.9a58.3,58.3,0,0,0-4.2,22.7q0,9.4,6,9.4t10-9.9a56.9,56.9,0,0,0,4.3-22.7q0-4.7-1.6-7.1A5.2,5.2,0,0,0,378.1,450.8Z" transform="translate(-255.6 -399)"/><path d="M488,512H466l0.7-8.7h-0.6a24.3,24.3,0,0,1-8.6,7.9,23,23,0,0,1-10.4,2.3q-11.2,0-17.1-7.9t-5.8-22.8a70.7,70.7,0,0,1,5.2-25.9q5.2-13.2,13.1-20a26.4,26.4,0,0,1,17.5-6.7,20.4,20.4,0,0,1,10.5,2.7,23.6,23.6,0,0,1,8.1,8.7h0.6l3.8-9.9h22Zm-29.6-20.7q3.6,0,6.8-4.2a31.8,31.8,0,0,0,5.2-11.1,51.2,51.2,0,0,0,1.9-13.6,16.5,16.5,0,0,0-1.4-7.4,4.7,4.7,0,0,0-4.4-2.8q-5.4,0-9.8,9a45.1,45.1,0,0,0-4.4,20Q452.3,491.3,458.4,491.3Z" transform="translate(-255.6 -399)"/><path d="M548.2,430.1a17.2,17.2,0,0,1,9,2.2q3.6,2.2,7.9,8.6h0.6v-2.6a94.3,94.3,0,0,1,1.8-15.4l4.4-21.4h27.8L576.3,512h-22l0.7-8.7h-0.6a24.8,24.8,0,0,1-8.5,7.9,22.9,22.9,0,0,1-10.5,2.3q-11.2,0-17.1-7.9t-5.8-22.8a71.2,71.2,0,0,1,5.1-25.8q5.1-13.1,13-20A26.3,26.3,0,0,1,548.2,430.1Zm-1.5,61.2q3.6,0,6.8-4.2a31.8,31.8,0,0,0,5.2-11.1,51.2,51.2,0,0,0,1.9-13.6q0-10.2-5.7-10.2-3.5,0-6.8,4.2a32.7,32.7,0,0,0-5.4,11,47.5,47.5,0,0,0-2.1,13.7Q540.6,491.3,546.7,491.3Z" transform="translate(-255.6 -399)"/><path d="M623.6,512H596.1l17-80.5h27.6Zm-7.2-98.2q0-7.3,4.2-11.1t11.8-3.8q6.5,0,10,2.6A8.7,8.7,0,0,1,646,409q0,7.1-4.1,11T630,423.8Q616.4,423.8,616.4,413.8Z" transform="translate(-255.6 -399)"/><path d="M697.6,458a6.1,6.1,0,0,0-1.6-4.6,5.2,5.2,0,0,0-3.8-1.5q-4,0-7.5,5t-5.6,15.8L670.9,512H643.4l17-80.5h22l-0.9,11.2h0.6q3.9-6.7,9.2-9.7a26.3,26.3,0,0,1,13-2.9q10,0,15.6,6.1t5.6,16.8a82.1,82.1,0,0,1-1.8,16.3l-9,42.8H687.2l9.2-43.9A45.2,45.2,0,0,0,697.6,458Z" transform="translate(-255.6 -399)"/><path d="M820,431.5l-2.9,14.7-11.4,3.7a27.8,27.8,0,0,1,.7,6.7q0,13.6-9.2,21.9t-24.1,8.3a34.6,34.6,0,0,1-8.8-.9l-2.4,1.6a2.6,2.6,0,0,0-1,2.1q0,3.1,7.9,4.2l9.7,1.3q12.4,1.8,17.8,6.5t5.4,13.5q0,15.3-12,23.6t-34,8.3q-15.1,0-24-5.4t-8.9-14.9a16.8,16.8,0,0,1,4.8-12q4.8-5,15.1-8.4a13.4,13.4,0,0,1-4.3-4.3,10.3,10.3,0,0,1-1.7-5.6,12.8,12.8,0,0,1,3.6-9q3.6-3.9,10.8-7.2-9.3-7.3-9.3-20t9.7-22.1q9.7-8.2,26.1-8.2a72.5,72.5,0,0,1,7.6.4,51.4,51.4,0,0,1,6.4,1H820Zm-73.7,91.3q0,6.1,12.1,6.1,8.9,0,13.5-2.1t4.7-5.8a4.2,4.2,0,0,0-2.3-3.9q-2.3-1.3-8.2-2l-8.2-.9a19.3,19.3,0,0,0-8.6,2.9A6.5,6.5,0,0,0,746.3,522.8Zm21.5-60q0,6.7,4.8,6.7t6.1-4.9a25.3,25.3,0,0,0,2.4-11.3q0-6.7-4.3-6.7A6,6,0,0,0,772,449a16.8,16.8,0,0,0-3.1,6.2A27.4,27.4,0,0,0,767.8,462.8Z" transform="translate(-255.6 -399)"/></svg>\');
                background-repeat: no-repeat;
                background-size: 25%;
                background-position: center;
            }
        </style>
        <div style="display:none;">
            <div class="type_show"><select><option value="true">yes</option><option value="false">no</option></select></div>
			<div class="type_type">'.$this->_makeOptionDropdown('**type_temp**', 'type').'</div>
			<div class="type_justification">'.$this->_makeOptionDropdown('**type_temp**', 'justification').'</div>
			<div class="type_wrap">'.$this->_makeOptionDropdown('**type_temp**', 'wrap').'</div>
			<div class="type_size">'.$this->_makeOptionDropdown('**type_temp**', 'size').'</div>
			<div class="type_content_alignment">'.$this->_makeOptionDropdown('**type_temp**', 'contentalignment').'</select></div>
			<div class="type_item_alignment">'.$this->_makeOptionDropdown('**type_temp**', 'itemalignment').'</div>
            
			<div class="type_media-query-size">'.$this->_makeOptionDropdown('**type_temp**', 'mediaquerysize').'</select></div>
			<div class="type_media-query-type">'.$this->_makeOptionDropdown('**type_temp**', 'mediaquerytype').'</select></div>
			<div class="type_hideat">'.$this->_makeOptionDropdown('**type_temp**', 'hideat').'</select></div>
			<div class="type_order">'.$this->_makeOptionDropdown('**type_temp**', 'order').'</div>
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
