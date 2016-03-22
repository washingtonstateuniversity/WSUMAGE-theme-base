<?php
/**
 * Links block
 *
 * @category    Mage
 * @package     Mage_Wishlist
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Wsu_Themecontrol_Block_Wishlist_Links extends Mage_Page_Block_Template_Links_Block
{
    /**
     * Position in link list
     * @var int
     */
    protected $_position = 30;

    /**
     * @return string
     */
    protected function _toHtml()
    {
        if ($this->helper('wishlist')->isAllow()) {
            $text = $this->_createLabel($this->_getItemCount());
            $this->_label = $text;
            $this->_title = $text;
            $this->_url = $this->getUrl('wishlist');
            return parent::_toHtml();
        }
        return '';
    }

    /**
     * Define label, title and url for wishlist link
     *
     * @deprecated after 1.6.2.0
     */
    public function initLinkProperties()
    {
        $text = $this->_createLabel($this->_getItemCount());
        $this->_label = $text;
        $this->_title = $text;
        $this->_url = $this->getUrl('wishlist');
    }

    /**
     * Count items in wishlist
     *
     * @return int
     */
    protected function _getItemCount()
    {
        return $this->helper('wishlist')->getItemCount();
    }

    /**
     * Create button label based on wishlist item quantity
     *
     * @param int $count
     * @return string
     */
    protected function _createLabel($count)
    {
        if ($count > 1) {
            return $this->__('<span>My Wishlist (%d items)</span>', $count);
        } else if ($count == 1) {
            return $this->__('<span>My Wishlist (%d item)</span>', $count);
        } else {
            return $this->__('<span>My Wishlist</span>');
        }
    }

    /**
     * @deprecated after 1.4.2.0
     * @see Mage_Wishlist_Block_Links::__construct
     *
     * @return array
     */
    public function addWishlistLink()
    {
        return $this;
    }

    /**
     * Retrieve block cache tags
     *
     * @return array
     */
    public function getCacheTags()
    {
        /** @var $wishlist Mage_Wishlist_Model_Wishlist */
        $wishlist = $this->helper('wishlist')->getWishlist();
        $this->addModelTags($wishlist);
        foreach ($wishlist->getItemCollection() as $item) {
            $this->addModelTags($item);
        }
        return parent::getCacheTags();
    }
}
