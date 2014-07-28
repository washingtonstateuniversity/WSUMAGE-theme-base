<?php
class Wsu_ThemeControl_Adminhtml_ImportController extends Mage_Adminhtml_Controller_Action {
    public function indexAction() {
        $this->getResponse()->setRedirect($this->getUrl("adminhtml/system_config/edit/section/wsu_themecontrol/"));
    }
    public function blocksAction() {
        $x0b = Mage::helper('wsu_themecontrol')->getCfg('install/overwrite_blocks');
        Mage::getSingleton('wsu_themecontrol/import_cms')->importCmsItems('cms/block', 'blocks', $x0b);
        $this->getResponse()->setRedirect($this->getUrl("adminhtml/system_config/edit/section/wsu_themecontrol/"));
    }
    public function pagesAction() {
        $x0b = Mage::helper('wsu_themecontrol')->getCfg('install/overwrite_pages');
        Mage::getSingleton('wsu_themecontrol/import_cms')->importCmsItems('cms/page', 'pages', $x0b);
        $this->getResponse()->setRedirect($this->getUrl("adminhtml/system_config/edit/section/wsu_themecontrol/"));
    }
}
