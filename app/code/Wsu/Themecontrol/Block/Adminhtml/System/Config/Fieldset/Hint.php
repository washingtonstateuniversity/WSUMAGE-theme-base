<?php
	
namespace Wsu\Themecontrol\Block\Adminhtml\System\Config\Fieldset;
class Hint extends \Magento\Config\Block\System\Config\Form\Field
{
    protected $_template = 'wsu/themecontrol/system/config/fieldset/hint.phtml';

    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        return $this->toHtml();
    }
}