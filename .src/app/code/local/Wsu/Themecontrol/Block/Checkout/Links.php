<?php
/**
 * Links block
 *
 * @category    Mage
 * @package     Mage_Checkout
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Wsu_Themecontrol_Block_Checkout_Links extends Mage_Core_Block_Template
{
    /**
     * Add shopping cart link to parent block
     *
     * @return Mage_Checkout_Block_Links
     */
    public function addCartLink()
    {
        $parentBlock = $this->getParentBlock();
        if ($parentBlock && Mage::helper('core')->isModuleOutputEnabled('Mage_Checkout')) {
            $hide_empty = $this->getData('cart_hide_empty');
            $label = $this->getData('cart_label');
            $label_signle = $this->getData('cart_label_signle');
            $label_full = $this->getData('cart_label_full');
            
            $hide_empty = $hide_empty !== null ? $hide_empty : 0;
            $label = $label !== null ? $label : 'Cart';
            $label_signle = $label_signle !== null ? $label_signle : 'Cart (%s item)';
            $label_full = $label_full !== null ? $label_full : 'Cart (%s items)';

            $count = $this->getSummaryQty() ? $this->getSummaryQty()
                : $this->helper('checkout/cart')->getSummaryCount();
            if ($count > 0 || ($count==0 && $hide_empty==0)) {
                if ($count == 1) {
                    $text = $this->__($label_signle, $count);
                } elseif ($count > 0) {
                    $text = $this->__($label_full, $count);
                } else {
                    $text = $this->__($label);
                }
    
                $parentBlock->removeLinkByUrl($this->getUrl('checkout/cart'));
                $parentBlock->addLink($text, 'checkout/cart', $text, true, array(), 50, null, 'class="top-link-cart '.($count > 0?'with-items':'').'"');
            }
        }
        return $this;
    }

    /**
     * Add link on checkout page to parent block
     *
     * @return Mage_Checkout_Block_Links
     */
    public function addCheckoutLink()
    {
        if (!$this->helper('checkout')->canOnepageCheckout()) {
            return $this;
        }

        $parentBlock = $this->getParentBlock();
        if ($parentBlock && Mage::helper('core')->isModuleOutputEnabled('Mage_Checkout')) {
            $hide_empty = $this->getData('checkout_hide_empty');
            $label = $this->getData('checkout_label');
            $show_price = $this->getData('checkout_total');
            
            $show_price = $show_price !== null ? $show_price : 0;
            $hide_empty = $hide_empty !== null ? $hide_empty : 0;
            $label = $label !== null ? $label : 'Checkout';
            
            $count = $this->getSummaryQty() ? $this->getSummaryQty()
                : $this->helper('checkout/cart')->getSummaryCount();
                
            if ($count > 0 || ($count==0 && $hide_empty==0)) {
                $text = $label;
                $html_text = $text;
                if ($show_price>0) {
                    $cartTotal = $this->helper('checkout/cart')->getQuote()->getGrandTotal();
                    $price_point = Mage::getModel('directory/currency')->formatTxt(
                        $cartTotal,
                        array('display' => Zend_Currency::NO_SYMBOL)
                    );
                    if ((int)$price_point != 0) {
                        $currency_code = Mage::app()->getStore()->getCurrentCurrencyCode();
                        $currency_symbol = Mage::app()->getLocale()->currency($currency_code)->getSymbol();
                        $html_text .='<span class="cart_total"> [<span class="currency_symbol">'.$currency_symbol.'</span>'.$price_point.']</span>';
                    }
                }
                $parentBlock->addLink(
                    $html_text,
                    'checkout',
                    $text,
                    true,
                    array('_secure' => true),
                    60,
                    null,
                    'class="top-link-checkout"'
                );//($label, $url='', $title='', $prepare=false, $urlParams=array(), $position=null, $liParams=null, $aParams=null, $beforeText='', $afterText='')
            }
        }
        return $this;
    }

    public function makeCompareLink()
    {
        $itemIds = array();
        $_productCollection = Mage::helper('catalog/product_compare')->getItemCollection();

        if (count($_productCollection)>0) {
            foreach ($_productCollection as $item) {
                $itemIds[] = $item->getId();
            }
            $params = array(
                'items' => implode(',', $itemIds),
                '_secure' => true
            );
            //$product_compare_url = $this->_getUrl('catalog/product_compare', $params);
            $parentBlock = $this->getParentBlock();
     
            $hide_empty = $this->getData('compare_hide_empty');
            $label = $this->getData('compare_label');
            
            $hide_empty = $hide_empty !== null ? $hide_empty : 0;
            $label = $label !== null ? $label : 'Compare Products';

            $text = $label;
            $parentBlock->addLink(
                $text,
                'catalog/product_compare',
                $text,
                true,
                $params,
                60,
                null,
                'class="top-link-compare"'
            );

        }
        return $this;
    }
}
