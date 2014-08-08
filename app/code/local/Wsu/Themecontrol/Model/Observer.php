<?php
/**
 * Call actions after configuration is saved
 */
class Wsu_Themecontrol_Model_Observer {
    /**
     * After any system config is saved
     */
    public function hookTo_controllerActionPostdispatchAdminhtmlSystemConfigSave() {
        $section = Mage::app()->getRequest()->getParam('section');
		$cssgen = Mage::getSingleton('wsu_themecontrol/cssgen_generator');
		
        if ($section == 'wsu_themecontrol_layout') {
            $websiteCode = Mage::app()->getRequest()->getParam('website');
            $storeCode   = Mage::app()->getRequest()->getParam('store');
            $cssgen->generateCss('grid', $websiteCode, $storeCode);
            $cssgen->generateCss('layout', $websiteCode, $storeCode);
        } elseif ($section == 'wsu_themecontrol_design') {
            $websiteCode = Mage::app()->getRequest()->getParam('website');
            $storeCode   = Mage::app()->getRequest()->getParam('store');
            $cssgen->generateCss('design', $websiteCode, $storeCode);
        }elseif ($section == 'wsu_themecontrol'){
			$websiteCode = Mage::app()->getRequest()->getParam('website');
			$storeCode = Mage::app()->getRequest()->getParam('store');
			$cssgen->generateCss('layout', $websiteCode, $storeCode);
		}
    }

	/**
	 * After store view is saved
	 */
	public function hookTo_storeEdit(Varien_Event_Observer $observer) {
		$store = $observer->getEvent()->getStore();
		if ($store->getIsActive()) {
			$this->_onStoreChange($store);
		}
	}

	/**
	 * After store view is added
	 */
	public function hookTo_storeAdd(Varien_Event_Observer $observer) {
		$store = $observer->getEvent()->getStore();
		if ($store->getIsActive()) {
			$this->_onStoreChange($store);
		}
	}

    /**
     * On store view changed
     */
    public function _onStoreChange($store) {
        $storeCode = $store->getCode();
        $websiteCode = $store->getWebsite()->getCode();
		$cssgen = Mage::getSingleton('wsu_themecontrol/cssgen_generator');
        $cssgen->generateCss('grid', $websiteCode, $storeCode);
        $cssgen->generateCss('layout', $websiteCode, $storeCode);
        $cssgen->generateCss('design', $websiteCode, $storeCode);
    }
}
