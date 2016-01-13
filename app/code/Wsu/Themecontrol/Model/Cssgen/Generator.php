<?php
class Wsu_Themecontrol_Model_Cssgen_Generator extends Mage_Core_Model_Abstract {
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
        $storeMarker = '_' . $storeCode;
        $fileName = $section . $storeMarker . '.css';
        $filePath = Mage::helper('wsu_themecontrol/cssgen')->getGeneratedCssDir() . $fileName;
        $template = 'wsu/themecontrol/css/' . $section . '.phtml';
        Mage::register('cssgen_store', $storeCode);
        try {
            $html = Mage::app()->getLayout()->createBlock("core/template")->setData('area', 'frontend')->setTemplate($template)->toHtml();
            if (empty($html)) {
                throw new Exception(Mage::helper('wsu_themecontrol')->__("Template file is empty or doesn't exist: %s", $template));
            }
            $cssFile = new Varien_Io_File();
            $cssFile->setAllowCreateFolders(true);
            $cssFile->open(array(
                'path' => Mage::helper('wsu_themecontrol/cssgen')->getGeneratedCssDir()
            ));
			
            $cssFile->streamOpen($filePath, 'w+');
            $cssFile->streamLock(true);
            $cssFile->streamWrite($html);
            $cssFile->streamUnlock();
            $cssFile->streamClose();
        }
        catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('wsu_themecontrol')->__('Failed generating CSS file: %s in %s', $fileName, Mage::helper('wsu_themecontrol/cssgen')->getGeneratedCssDir()) . '<br/>Message: ' . $e->getMessage());
            Mage::logException($e);
        }
        Mage::unregister('cssgen_store');
    }
}