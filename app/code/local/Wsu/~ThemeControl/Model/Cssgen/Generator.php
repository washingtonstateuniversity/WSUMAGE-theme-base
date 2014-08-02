<?php
class Wsu_ThemeControl_Model_Cssgen_Generator extends Mage_Core_Model_Abstract {
    public function __construct() {
        parent::__construct();
    }
    public function generateCss($section, $websiteCode, $storeCode){
        if ($websiteCode) {
            if ($storeCode) {
                $this->_generateStoreCss($section, $storeCode);
            } else {
                $this->_generateWebsiteCss($section, $websiteCode);
            }
        } else {
            $sites = Mage::app()->getWebsites(false, true);
            foreach ($sites as $key => $siteobj) {
                $this->_generateWebsiteCss($section, $siteobj);
            }
        }
    }
    protected function _generateWebsiteCss($section, $websiteCode){//$x0b, $x0c) {
        $site = Mage::app()->getWebsite($websiteCode);
        foreach ($site->getStoreCodes() as $siteobj) {
            $this->_generateStoreCss($section, $siteobj);
        }
    }
    protected function _generateStoreCss($section, $storeCode) {
        if (!Mage::app()->getStore($storeCode)->getIsActive())
            return;
        $x11 = '_' . $storeCode;
        $x12 = $section . $x11 . '.css';
        $x13 = Mage::helper('wsu_themecontrol/cssgen')->getGeneratedCssDir() . $x12;
        $x14 = 'wsu/themecontrol/css/' . $section . '.phtml';
        Mage::register('cssgen_store', $storeCode);
        try {
            $x15 = Mage::app()->getLayout()->createBlock("core/template")->setData('area', 'frontend')->setTemplate($x14)->toHtml();
            if (empty($x15)) {
                throw new Exception(Mage::helper('wsu_themecontrol')->__("Template file is empty or doesn't exist: %s", $x14));
            }
            $x16 = new Varien_Io_File();
            $x16->setAllowCreateFolders(true);
            $x16->open(array(
                'path' => Mage::helper('wsu_themecontrol/cssgen')->getGeneratedCssDir()
            ));
            $x16->streamOpen($x13, 'w+');
            $x16->streamLock(true);
            $x16->streamWrite($x15);
            $x16->streamUnlock();
            $x16->streamClose();
        }
        catch (Exception $x17) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('wsu_themecontrol')->__('Failed generating CSS file: %s in %s', $x12, Mage::helper('wsu_themecontrol/cssgen')->getGeneratedCssDir()) . '<br/>Message: ' . $x17->getMessage());
            Mage::logException($x17);
        }
        Mage::unregister('cssgen_store');
    }
}