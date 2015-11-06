<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage_Checkout
 * @copyright  Copyright (c) 2006-2015 X.commerce, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

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
			if($count > 0 || ($count==0 && $hide_empty==0)){
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
				
			if($count > 0 || ($count==0 && $hide_empty==0)){
				$text = $label;
				$html_text = $text;
				if($show_price>0){
					$cartTotal = $this->helper('checkout/cart')->getQuote()->getGrandTotal();
					$currency_code = Mage::app()->getStore()->getCurrentCurrencyCode();
					$currency_symbol = Mage::app()->getLocale()->currency( $currency_code )->getSymbol();
					$html_text .='<span class="cart_total"> [<span class="currency_symbol">'.$currency_symbol.'</span>'.
									Mage::getModel('directory/currency')->formatTxt(
										$cartTotal,
										array('display' => Zend_Currency::NO_SYMBOL)
									).
								']</span>';
				}
				$parentBlock->addLink(
					$html_text, 'checkout', $text,
					true, array('_secure' => true), 60, null,
					'class="top-link-checkout"'
				);//($label, $url='', $title='', $prepare=false, $urlParams=array(), $position=null, $liParams=null, $aParams=null, $beforeText='', $afterText='')
			}
        }
        return $this;
    }
	
	
	public function makeCompareLink( ) {

        $itemIds = array();
		$_productCollection = Mage::helper('catalog/product_compare')->getItemCollection();

		if(count($_productCollection)>0){
			foreach ($_productCollection as $item) {
				$itemIds[] = $item->getId();
			}
	
			 $params = array(
				'items' => implode(',', $itemIds),
				'_secure' => true
			);
	
			//$product_compare_url = $this->_getUrl('catalog/product_compare', $params);
	
	
			$parentBlock = $this->getParentBlock();
	 
			$hide_empty = $this->getData('checkout_hide_empty');
			$label = $this->getData('checkout_label');
			
			$hide_empty = $hide_empty !== null ? $hide_empty : 0;
			$label = $label !== null ? $label : 'Compare Products';

			$text = $this->__('Compare Products');
			$parentBlock->addLink(
				$text, 'catalog/product_compare', $text,
				true, $params, 60, null,
				'class="top-link-compare"'
			);

		}
        return $this;
	}
	
	
}
