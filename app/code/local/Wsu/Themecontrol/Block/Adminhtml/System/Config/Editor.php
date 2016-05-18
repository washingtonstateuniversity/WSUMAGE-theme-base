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
		<script src="/js/wsu/codemirror/lib/codemirror.js"></script>
        <script src="/js/wsu/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script src="/js/wsu/codemirror/mode/css/css.js"></script>
        <script src="/js/wsu/codemirror/mode/javascript/javascript.js"></script>
        <link rel="stylesheet" href="/js/wsu/codemirror/lib/codemirror.css"><!---->
		<script>
            var codeblockID = null;
            var mode = "htmlmixed";
            if(jQuery("#wsu_themecontrol_override_editor_override").length){
               jQuery("#wsu_themecontrol_override_editor_override").closest("td").attr("style","width:100% !important");
               codeblockID = "wsu_themecontrol_override_editor_override";
               mode = "css";
            }else if(jQuery("#wsu_themecontrol_globaljs_editor_globaljs").length){
                jQuery("#wsu_themecontrol_globaljs_editor_globaljs").closest("td").attr("style","width:100% !important");
                codeblockID = "wsu_themecontrol_globaljs_editor_globaljs";
                mode = "javascript";
            }
            
            var myCodeMirror = CodeMirror.fromTextArea(document.getElementById(codeblockID), {
                lineNumbers: true,
                mode: mode
              });

		</script>';
        return parent::_getElementHtml($element).$html;
    }
}