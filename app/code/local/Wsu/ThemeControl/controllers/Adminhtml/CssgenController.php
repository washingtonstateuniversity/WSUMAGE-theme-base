<?php
class Wsu_ThemeControl_Adminhtml_CssgenController extends Mage_Adminhtml_Controller_Action {
    public function indexAction() {
        $this->getResponse()->setRedirect($this->getUrl("a\x64\x6d\151\156h\164\x6d\x6c\057\x73\x79\x73t\x65\x6d\x5f\143\157n\x66\x69\x67/\145\144i\164\057\x73e\x63t\151o\x6e/\165l\x74\x69m\157\057"));
    }
    public function gridAction() {
        $x0b = Mage::app()->getRequest()->getParam('website');
        $x0c = Mage::app()->getRequest()->getParam('store');
        $x0d = $this->getUrl('adminhtml/system_config/edit/section/wsu_themecontrol_layout', array(
            'website' => $x0b,
            'store' => $x0c
        ));
        Mage::getSingleton('wsu_themecontrol/cssgen_generate')->generateCss('grid', $x0b, $x0c);
        Mage::getSingleton('wsu_themecontrol/cssgen_generate')->generateCss('layout', $x0b, $x0c);
        $this->getResponse()->setRedirect($x0d);
    }
    public function designAction() {
        $x0b = Mage::app()->getRequest()->getParam('website');
        $x0c = Mage::app()->getRequest()->getParam('store');
        $x0d = $this->getUrl('adminhtml/system_config/edit/section/wsu_themecontrol_design', array(
            'website' => $x0b,
            'store' => $x0c
        ));
        Mage::getSingleton('wsu_themecontrol/cssgen_generate')->generateCss('design', $x0b, $x0c);
        $this->getResponse()->setRedirect($x0d);
    }
}
