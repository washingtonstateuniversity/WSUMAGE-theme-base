<?php
namespace Wsu\Themecontrol\Model\System\Config\Backend\Design\Color;

class Validatetransparent extends  \Magento\Framework\App\Config\Value
{
    public function save() {
        //Get the value from config
        $v = $this->getValue();
        if ($v == 'rgba(0, 0, 0, 0)') {
            $this->setValue('transparent');
            //Mage::getSingleton('adminhtml/session')->addNotice("value == rgba(0, 0, 0, 0)");
        }
        return parent::save();
    }
}
