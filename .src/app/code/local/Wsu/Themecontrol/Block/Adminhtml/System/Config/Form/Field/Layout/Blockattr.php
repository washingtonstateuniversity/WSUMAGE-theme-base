<?php
class Wsu_Themecontrol_Block_Adminhtml_System_Config_Form_Field_Layout_Blockattr extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    /**
     * Add texture preview
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return String
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $element->setHtmlId(str_replace('.', '_', $element->getHtmlId()));
        $html        = $element->getElementHtml();
        return $html;
    }
}
