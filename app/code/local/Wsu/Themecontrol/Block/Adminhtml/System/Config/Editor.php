<?php
class Wsu_Themecontrol_Block_Adminhtml_System_Config_Editor extends Mage_Adminhtml_Block_System_Config_Form_Field implements Varien_Data_Form_Element_Renderer_Interface{
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element){
       // $element->setWysiwyg(true);
       // $element->setConfig(Mage::getSingleton('cms/wysiwyg_config')->getConfig());
	   
	   
/**/

		$html = '
		<style>
		#wsu_themecontrol_override_editor_override,
		#wsu_themecontrol_globaljs_editor_globaljs{
			width:100%;
			min-height:500px;
			height:auto;
		}
		</style>
		<script src="/js/ace/ace.js"></script>
		<script>
		 	//var editor = ace.edit("wsu_themecontrol_override_editor_override");
			//editor.setTheme("ace/theme/monokai");
			//editor.getSession().setMode("ace/mode/css");
		</script>';
        return parent::_getElementHtml($element).$html;
    }
}