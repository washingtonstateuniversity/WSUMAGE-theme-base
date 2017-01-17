<?php
/**
 * Call actions after configuration is saved
 */
class Wsu_Themecontrol_Model_Config extends Mage_Page_Model_Config
{

    const XML_PATH_PAGE_REMOVE_LAYOUTS = 'global/page/remove_layouts';

    /**
     * Initialize page layouts list
     *
     * @return Labor_Templates_Model_Config
     */
    protected function _initPageLayouts()
    {
        parent::_initPageLayouts();
        return $this->_removePageLayouts(self::XML_PATH_PAGE_REMOVE_LAYOUTS);
    }

    /**
     * Removes page layouts found in the remove_layouts XML directive
     *
     * @return Labor_Templates_Model_Config
     */
    protected function _removePageLayouts($xmlPath)
    {
        if (!Mage::getConfig()->getNode($xmlPath) || !is_array($this->_pageLayouts)) {
            return $this;
        }
        foreach (explode(',', (string)Mage::getConfig()->getNode($xmlPath)->children()->layouts) as $toRemove) {
            unset($this->_pageLayouts[$toRemove]);
        }
        return $this;
    }
}
