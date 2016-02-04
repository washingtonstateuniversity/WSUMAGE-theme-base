<?php

namespace Wsu\Themecontrol\Block\Adminhtml\System\Config\Form\Field\Layout;

//use Magento\Framework\App\Config\ScopeConfigInterface;

class Blockattr extends \Magento\Config\Block\System\Config\Form\Field
{
    /**
     * Add texture preview
     *
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return String
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element) {
		$element->setHtmlId(str_replace('.','_',$element->getHtmlId()));
        $html        = $this->toHtml();
        return $html;
    }
}
