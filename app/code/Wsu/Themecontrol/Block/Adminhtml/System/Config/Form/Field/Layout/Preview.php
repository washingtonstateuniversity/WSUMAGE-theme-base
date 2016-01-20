<?php

namespace Wsu\Themecontrol\Block\System\Config\Form\Field\Layout;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Preview extends \Magento\Config\Block\System\Config\Form\Field
{

    /**
     * Add texture preview
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return String
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element) {
		$html        = $this->_toHtml();
		return $html;

    }
}
