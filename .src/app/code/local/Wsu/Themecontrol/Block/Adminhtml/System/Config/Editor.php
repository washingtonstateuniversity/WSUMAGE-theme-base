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
        
        <script src="/js/wsu/codemirror/addon/fold/foldcode.js"></script>
        <script src="/js/wsu/codemirror/addon/fold/foldgutter.js"></script>
        <script src="/js/wsu/codemirror/addon/fold/brace-fold.js"></script>
        


        <script src="//ajax.aspnetcdn.com/ajax/jshint/r07/jshint.js"></script>
        <script src="http://csslint.net/js/csslint.js"></script>
        <script src="/js/wsu/codemirror/addon/lint/lint.js"></script>
        <script src="/js/wsu/codemirror/addon/lint/javascript-lint.js"></script>
        <script src="/js/wsu/codemirror/addon/lint/css-lint.js"></script>
        
        <link rel="stylesheet" href="/js/wsu/codemirror/lib/codemirror.css">
        <link rel="stylesheet" href="/js/wsu/codemirror/theme/lesser-dark.css">
        <link rel="stylesheet" href="/js/wsu/codemirror/addon/lint/lint.css">
        <link rel="stylesheet" href="/js/wsu/codemirror/addon/fold/foldgutter.css" /><!---->
		<script>
        (function($){
            var codeblockID = null;
            var mode = "htmlmixed";
            var options = {};
            var width = 500;
            if($("#wsu_themecontrol_override_editor_override").length){
                $(window).on("resize",function(){
                    var row = $("#row_wsu_themecontrol_override_editor_override");
                    row.find(".label").hide();
                    width = $(".main-col-inner").width() - 50;
                    $("#wsu_themecontrol_override_editor_override").closest("td").attr("style","max-width:"+width+"px !important;width:"+width+"px !important;");
                }).trigger("resize");
               
                codeblockID = "wsu_themecontrol_override_editor_override";
                mode = "css";
                options ={
                    mode: mode,
                    lint: true
                };
            }else if($("#wsu_themecontrol_globaljs_editor_globaljs").length){
                $(window).on("resize",function(){
                    var row = $("#row_wsu_themecontrol_globaljs_editor_globaljs");
                    row.find(".label").hide();
                    width = $(".main-col-inner").width() - 50;
                    $("#wsu_themecontrol_globaljs_editor_globaljs").closest("td").attr("style","max-width:"+width+"px !important;width:"+width+"px !important;");
                }).trigger("resize");
                
                codeblockID = "wsu_themecontrol_globaljs_editor_globaljs";
                mode = "javascript";
                options ={
                    mode: mode,
                    lint: true
                };
            }
            var settings = jQuery.extend({ 
                                        theme:"lesser-dark",
                                        lineWrapping: true,
                                        lineNumbers: true,
                                        gutters: ["CodeMirror-lint-markers","CodeMirror-linenumbers", "CodeMirror-foldgutter"],
                                        foldGutter: true
                                    },
                                    options);
            var myCodeMirror = CodeMirror.fromTextArea(document.getElementById(codeblockID), settings);
        }(jQuery));
           

		</script>';
        return parent::_getElementHtml($element).$html;
    }
}