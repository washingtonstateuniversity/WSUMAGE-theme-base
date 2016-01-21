<?php

namespace Wsu\Themecontrol\Block\System\Config\Form\Field\Layout;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Blockattr extends Mage_Adminhtml_Block_System_Config_Form_Field {
    /**
     * Add texture preview
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return String
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element) {
		$element->setHtmlId(str_replace('.','_',$element->getHtmlId()));
        $html        = $element->getElementHtml();
        return $html;
    }
}
