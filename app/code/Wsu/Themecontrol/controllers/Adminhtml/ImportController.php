<?php
class Wsu_Themecontrol_Adminhtml_ImportController extends Mage_Adminhtml_Controller_Action {
    public function indexAction() {
        $this->getResponse()->setRedirect($this->getUrl("adminhtml/system_config/edit/section/wsu_themecontrol/"));
    }
    public function blocksAction() {
        $overwrite = Mage::helper('wsu_themecontrol')->getCfg('install/overwrite_blocks');
        Mage::getSingleton('wsu_themecontrol/import_cms')->importCmsItems('cms/block', 'blocks', $overwrite);
        $this->getResponse()->setRedirect($this->getUrl("adminhtml/system_config/edit/section/wsu_themecontrol/"));
    }
    public function pagesAction() {
        $overwrite = Mage::helper('wsu_themecontrol')->getCfg('install/overwrite_pages');
        Mage::getSingleton('wsu_themecontrol/import_cms')->importCmsItems('cms/page', 'pages', $overwrite);
        $this->getResponse()->setRedirect($this->getUrl("adminhtml/system_config/edit/section/wsu_themecontrol/"));
    }
}
