<?php
namespace Wsu\Themecontrol\Block\Adminhtml\System\Config;
class Editor extends \Magento\Config\Block\System\Config\Form\Field{
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement  $element){
       // $element->setWysiwyg(true);
       // $element->setConfig(Mage::getSingleton('cms/wysiwyg_config')->getConfig());
	   
	   
/**/

		$html = '
		<style>
		#wsu_themecontrol_override_editor_override{
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