<?php
class Wsu_Themecontrol_Adminhtml_CssgenController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->getResponse()->setRedirect($this->getUrl("adminhtml/system_config/edit/section/wsu_themecontrol/"));
    }
    public function gridAction()
    {
        $website = Mage::app()->getRequest()->getParam('website');
        $store = Mage::app()->getRequest()->getParam('store');
        $themecontrol_layout_url = $this->getUrl('adminhtml/system_config/edit/section/wsu_themecontrol_layout', array(
            'website' => $website,
            'store' => $store
        ));
        Mage::getSingleton('wsu_themecontrol/cssgen_generate')->generateCss('grid', $website, $store);
        Mage::getSingleton('wsu_themecontrol/cssgen_generate')->generateCss('layout', $website, $store);
        $this->getResponse()->setRedirect($themecontrol_layout_url);
    }
	
	public function previewurlAction()
    {
        $website = Mage::app()->getRequest()->getParam('website');
        $store = Mage::app()->getRequest()->getParam('store');
		
		$url = "";
		if("productview" === $_REQUEST["type"]){
			$url = Mage::helper('wsu_themecontrol/layout')->_testProductPage($store);
		}
		if("productlist" === $_REQUEST["type"]){
			$url = Mage::helper('wsu_themecontrol/layout')->_testCategoryPage($store);
		}
		
		
		
		$this->getResponse()->setHeader('Content-type', 'application/json');
        $this->getResponse()->setBody( '{"_url":"' . $url . '"} ');
        return;
    }

    public function designAction()
    {
        $website = Mage::app()->getRequest()->getParam('website');
        $store = Mage::app()->getRequest()->getParam('store');
        $themecontrol_design_url = $this->getUrl('adminhtml/system_config/edit/section/wsu_themecontrol_design', array(
            'website' => $website,
            'store' => $store
        ));
        Mage::getSingleton('wsu_themecontrol/cssgen_generate')->generateCss('design', $website, $store);
        $this->getResponse()->setRedirect($themecontrol_design_url);
    }
    public function overrideAction()
    {
        $website = Mage::app()->getRequest()->getParam('website');
        $store = Mage::app()->getRequest()->getParam('store');
        $themecontrol_override_url = $this->getUrl('adminhtml/system_config/edit/section/wsu_themecontrol_override', array(
            'website' => $website,
            'store' => $store
        ));
        Mage::getSingleton('wsu_themecontrol/cssgen_generate')->generateCss('override', $website, $store);
        $this->getResponse()->setRedirect($themecontrol_override_url);
    }
    public function globaljsAction()
    {
        $website = Mage::app()->getRequest()->getParam('website');
        $store = Mage::app()->getRequest()->getParam('store');
        $themecontrol_globaljs_url = $this->getUrl('adminhtml/system_config/edit/section/wsu_themecontrol_globaljs', array(
            'website' => $website,
            'store' => $store
        ));
        Mage::getSingleton('wsu_themecontrol/cssgen_generate')->generateCss('globaljs', $website, $store);
        $this->getResponse()->setRedirect($themecontrol_globaljs_url);
    }
}
