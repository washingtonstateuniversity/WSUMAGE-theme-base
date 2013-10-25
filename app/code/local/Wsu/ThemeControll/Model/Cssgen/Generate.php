<?php
class Wsu_ThemeControll_Model_Cssgen_Generate extends Mage_Core_Model_Abstract {
    protected $x0b;
    public function __construct() {
        parent::__construct();
        $this->_cssDirPath = Mage::getBaseDir() . '/' . Mage::helper('themecontroll')->getGeneratedCssPath();
    }
    public function generateCss($x0c, $x0d, $x0e) {
        if ($x0d) {
            if ($x0e) {
                $this->generateStoreCss($x0c, $x0e);
            } else {
                $this->_generateWebsiteCss($x0c, $x0d);
            }
        } else {
            $x0f = Mage::app()->getWebsites(false, true);
            foreach ($x0f as $x10 => $x11) {
                $this->_generateWebsiteCss($x0c, $x10);
            }
        }
    }
    protected function _generateWebsiteCss($x0c, $x0d) {
        $x11 = Mage::app()->getWebsite($x0d);
        foreach ($x11->getStoreCodes() as $x10) {
            $this->generateStoreCss($x0c, $x10);
        }
    }
    public function generateStoreCss($x0c, $x0e = '') {
        $x12 = $x0e ? '_' . $x0e : '';
        $x13 = '_' . $x0c . $x12 . '.css';
        $x14 = $this->_cssDirPath . $x13;
        $x15 = 'wsu/themecontroll/css/' . $x0c . '.phtml';
        Mage::register('cssgen_store', $x0e);
        try {
            $x16 = Mage::app()->getLayout()->createBlock("\143\157r\x65/\164\x65\x6d\160\154\x61\x74\x65")->setData('area', 'frontend')->setTemplate($x15)->toHtml();
            if (empty($x16)) {
                throw new Exception(Mage::helper('themecontroll')->__("\124e\155\160\154\x61t\x65 f\x69l\x65 \151\163\040\145\155pty\x20or\x20d\157\x65\163\156'\x74 \x65\x78\x69\163t\072 \x25s", $x15));
            }
            $x17 = new Varien_Io_File();
            $x17->setAllowCreateFolders(true);
            $x17->open(array(
                'path' => $this->_cssDirPath
            ));
            $x17->streamOpen($x14, 'w+');
            $x17->streamLock(true);
            $x17->streamWrite($x16);
            $x17->streamUnlock();
            $x17->streamClose();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('themecontroll')->__('CSS file %s has been refreshed', $x13));
        }
        catch (Exception $x18) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('themecontroll')->__('Failed refreshing css file %s in %s', $x13, Mage::helper('themecontroll')->getGeneratedCssPath()) . '<br/>Message: ' . $x18->getMessage());
            Mage::logException($x18);
        }
        Mage::unregister('cssgen_store');
    }
}