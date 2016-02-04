<?php
	
namespace Wsu\Themecontrol\Block\Adminhtml\System\Config\Fieldset;
class Hint extends \Magento\Backend\Block\Template implements \Magento\Framework\Data\Form\Element\Renderer\RendererInterface
{
    protected $_template = 'Wsu_Themecontrol::system/config/fieldset/hint.phtml';

    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    
        return $this->toHtml();
    }
}