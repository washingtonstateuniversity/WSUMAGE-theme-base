<?php
class Wsu_Themecontrol_Helper_Layout extends Mage_Core_Helper_Abstract
{
	
    /**
     * Sectional Data block
     *
     * @var array
     */
    protected $_sectionalData;

    /**
     * Sectional Data block
     *
     * @var array
     */
    protected $_layoutTarget;

    
	/**
	 * Get CSS for grid item based on number of columns
	 *
	 * @param int $columnCount
	 * @return string
	 */
	public function setupLayout($ref, $extract=array())
    {
		$BlockName = str_replace('.','_',$ref->getNameInLayout());
		$ControllerName = $ref->getRequest()->getControllerName();
		$ActionName = $ref->getRequest()->getActionName();
		$RouteName = $ref->getRequest()->getRouteName();
		$ModuleName = $ref->getRequest()->getModuleName();
		
		$fullpath = $RouteName.'_'.$ControllerName.'_'.$ActionName;
		echo '<!--';
		var_dump($fullpath);
		echo '-<<-route/controll/action | block ->>-';
		var_dump($BlockName);
		echo '-->';
		$theme = $ref->helper('wsu_themecontrol');
		$block_settings = $theme->getCfgLayout($fullpath.'/used'.'_'.$BlockName);
		$extractables = !empty($extract) ? $extract : array('row_type','padding','padding_flanks','padding_ends');
		$extracted = array();
		//var_dump($block_settings);
		foreach($extractables as $name){
			$setting = null;
			if($block_settings==1){
				$setting = $theme->getCfgLayout($fullpath.'/'.$name.'_'.$BlockName);
				//var_dump($setting);
				//var_dump($fullpath.'/'.$name.'_'.$BlockName);
			}
			if($setting==null){
				$setting = $theme->getCfgLayout('layout_default/'.$name.'_'.$BlockName);
				//var_dump('layout_default/'.$name.'_'.$BlockName);
				//var_dump($setting);
			}
			
			$extracted[$name] = $setting;
		}
		return $extracted;
	}
    
    /**
     * Set the data for the css file being rendered
     */	
	 
	public function set_layoutTarget( $name = 'catalog_product_view/productview' )
	{
        $this->_layoutTarget = $name;
	}
	 
	 
	public function set_sectionalData()
	{
        $theme = Mage::helper('wsu_themecontrol');
        $block_settings = $theme->getCfgLayout($this->_layoutTarget);
        $this->_sectionalData = json_decode($block_settings);
	}
    /**
     * Set the data for the css file being rendered
     */	
	public function getLayout()
	{
        if( null === $this->_sectionalData ){
            $this->set_sectionalData();
        }
        return $this->_sectionalData;
	}    
	public function getLayoutSettings( $block, $part="", $settings = null )
    {
		if( "" === $part ){
			$layout = $this->getLayout();
		} else {
			$layout = $part;
		}
		if(isset($layout)){
			foreach($layout as $item=>$parts){
				if( null === $settings ){
					if( $item === $block ){
						$settings = $parts->settings;
					}elseif( isset($parts->children) && null !== $parts->children ){
						$settings = $this->getLayoutSettings($block,$parts->children,$settings);
					}
				}
			}
		}
		return $settings;
	}
	public function getLayoutBlockClass($block)
    {
		$layout = $this->getLayoutSettings($block);
		$class = "";
		if(isset($layout)){
			foreach($layout as $item=>$parts){
				if("size" === $item){
					$class .= " grid-part";
				}
				$class .= " ".$parts;
			}
		}
		return $class;
	}
	
	
	
	public function getLayoutOptions($ref, $extract=array())
    {
		$BlockName = str_replace('.','_',$ref->getNameInLayout());
		$ControllerName = $ref->getRequest()->getControllerName();
		$ActionName = $ref->getRequest()->getActionName();
		$RouteName = $ref->getRequest()->getRouteName();
		$ModuleName = $ref->getRequest()->getModuleName();
		
		$fullpath = $RouteName.'_'.$ControllerName.'_'.$ActionName;
		echo "<!--\r";
        echo "route :";
		var_dump($fullpath);
		echo "\rblock:";
		var_dump($BlockName);
		echo "\r-->";
		$theme = $ref->helper('wsu_themecontrol');
		//$block_settings = $theme->getCfgLayout($fullpath.'/used'.'_'.$BlockName);
		//$extractables = !empty($extract) ? $extract : array('row_type','padding','padding_flanks','padding_ends');
		//$extracted = array();
		//var_dump($block_settings);
		/*foreach($extractables as $name){
			$setting = null;
			if($block_settings==1){
				$setting = $theme->getCfgLayout($fullpath.'/'.$name.'_'.$BlockName);
				//var_dump($setting);
				//var_dump($fullpath.'/'.$name.'_'.$BlockName);
			}
			if($setting==null){
				$setting = $theme->getCfgLayout('layout_default/'.$name.'_'.$BlockName);
				//var_dump('layout_default/'.$name.'_'.$BlockName);
				//var_dump($setting);
			}
			
			$extracted[$name] = $setting;
		}*/
		

        $layouts = [
        
            "product_info"=>[
                    "product-content"=>["type"=>"flex-column","size"=>"fifths-3","order"=>"order-1"],
                    "product-media"=>["size"=>"fifths-2","order"=>"order-2"],
                    "media-block"=>["type"=>"flex-row"],
					
                    "email_area"=>["order"=>"order-8"],
                    "review_area"=>["order"=>"order-9"],
                    "alert_urls_area"=>["order"=>"order-7"],
                    "product_type_data_area"=>["order"=>"order-3"],
                    "tier_price_area"=>["order"=>"order-4"],
                    "extrahint_area"=>["order"=>"order-5"],
                    "short_description_area"=>["order"=>"order-1"],
                    "other_area"=>["order"=>"order-6"],
                    "container1_area"=>["order"=>"order-2"],
                    "description_area"=>["order"=>"order-10"],

                ],
            "product_info_media"=>[
                    
                    "product-image"=>["size"=>"sixths-5","order"=>"order-2"],
                    "more-views"=>["size"=>"sixths-1","order"=>"order-1"],
                    "more-views-imgs"=>["type"=>"flex-column"]
                ],        
            "product_list"=>[
                    "category-products-grid"=>["type"=>"flex-row","spacing"=>"justify-between"],
                    "products-grid-item"=>["type"=>"flex-column"],
                    "products-grid-item-image"=>["order"=>"order-1"],
                    "products-grid-item-name"=>["order"=>"order-2"],
                    "products-grid-item-price"=>["order"=>"order-4"],
                    "products-grid-item-rating"=>["order"=>"order-3"],
                    "products-grid-item-action"=>["order"=>"order-5"],
                ],
            "product_list_toolbar"=>[
                    "toolbox-top"=>["type"=>"flex-row", "flow"=>"wrap"],
                    "toolbox-bottom"=>["type"=>"flex-row", "flow"=>"wrap"]
                ],
            
        
        
        ];
        
        
        $tmp = [

                ];
        
        
        
        
        
		return isset($layouts[$BlockName]) ? $layouts[$BlockName] : $tmp;
	}
	public function getMapBlockMapping($block,$values)
    {
		/*
		array('value' => 'single',			'label' => Mage::helper('wsu_themecontrol')->__('single')),
		array('value' => 'halves',			'label' => Mage::helper('wsu_themecontrol')->__('halves')),
		array('value' => 'thirds',			'label' => Mage::helper('wsu_themecontrol')->__('thirds')),
		array('value' => 'side-left',		'label' => Mage::helper('wsu_themecontrol')->__('side-left')),
		array('value' => 'side-right',		'label' => Mage::helper('wsu_themecontrol')->__('side-right')),
		array('value' => 'margin-left',		'label' => Mage::helper('wsu_themecontrol')->__('margin-left')),
		array('value' => 'margin-right',	'label' => Mage::helper('wsu_themecontrol')->__('margin-right')),
		array('value' => 'triptych',		'label' => Mage::helper('wsu_themecontrol')->__('triptych')),
		array('value' => 'quarters',		'label' => Mage::helper('wsu_themecontrol')->__('quarters')),
		array('value' => 'eighths',			'label' => Mage::helper('wsu_themecontrol')->__('eighths'))
		*/
		$map = array(
			'wsu_themecontrol_layout_catalog_product_view_row_type_product_info'=>array('single','halves','side-left','side-right')
		);
		$used_values = array();
		if (isset($map[$block])) {
			foreach($values as $item){
				if(in_array($item['value'],$map[$block])){
					$used_values[]=$item;
				}
			}
		} else {
			$used_values = $values;
		}
		
		
		return $used_values;	
	}
	
	
	public function _testProductPage($store = null)
	{
		$store = Mage::app()->getStore($store);
		
		$products = Mage::getModel('catalog/product')->getCollection()->addStoreFilter($store)->addAttributeToFilter('visibility', 4);
		$products->getSelect()->order(new Zend_Db_Expr('RAND()'));
		$ids = $products->getAllIds(5);
		
		$url = "/skin/adminhtml/default/default/wsu/field/product_preview.html";
		if (empty($ids)) {
			return $url;
		}
		//var_dump($ids);
		$productId = array_rand(array_flip($ids), 1);
		//var_dump($productId);
		$product = Mage::getModel('catalog/product')->load($productId)->setStoreId( $store->getId() );
		if(isset($product)){
			$url = preg_replace( '/\?.*/', '', $product->getProductUrl() );
		}
		
		return $url;
    }
	
	public function _testCategoryPage($store = null)
	{
		
		$store = Mage::app()->getStore($store);
        $ids = Mage::getModel('catalog/category')->getCollection()
            ->setStoreId($store->getId())
            ->addIsActiveFilter()
            ->addFieldToFilter('level', array('gt' => 1))
            ->getAllIds();


		$url = "/skin/adminhtml/default/default/wsu/field/product_preview.html";
		if (empty($ids)) {
			return $url;
		}

        $categoryId = array_rand(array_flip($ids), 1);
        $category = Mage::getModel('catalog/category')->load($categoryId)->setStoreId( $store->getId() );
        $url = preg_replace('/\?.*/', '', $category->getUrl());
		
		return $url;
    }
	
	
	public function getCartLabel()
    {
		$cart_label = Mage::helper('wsu_themecontrol')->getCfg('header/cart_label');
		return $cart_label!=null ? $cart_label : Mage::helper('wsu_themecontrol')->__('Cart');
	}
    
	public function getCartLabelSingle()
    {
		$cart_label = Mage::helper('wsu_themecontrol')->getCfg('header/cart_label_single');
		return $cart_label!=null ? $cart_label : Mage::helper('wsu_themecontrol')->__('Cart')." (%s ".Mage::helper('wsu_themecontrol')->__('item').")";
	}
    
	public function getCartLabelFull()
    {
		$cart_label = Mage::helper('wsu_themecontrol')->getCfg('header/cart_label_full');
		return $cart_label!=null ? $cart_label : Mage::helper('wsu_themecontrol')->__('Cart')." (%s ".Mage::helper('wsu_themecontrol')->__('items').")";
	}
    
	public function getCheckoutLabel()
    {
		$checkout_label = Mage::helper('wsu_themecontrol')->getCfg('header/checkout_label');
		return $checkout_label!=null ? $checkout_label : Mage::helper('wsu_themecontrol')->__('Checkout');
	}

	public function getSpineVersionCss()
    {
		$version = Mage::helper('wsu_themecontrol')->getCfgLayout('spine/spine_version');
		return sprintf("//repo.wsu.edu/spine/%s/spine.min.css",($version!=null ? $version : "1"));
	}	
    
	public function getSpineVersionJs()
    {
		$version = Mage::helper('wsu_themecontrol')->getCfgLayout('spine/spine_version');
		return sprintf("//repo.wsu.edu/spine/%s/spine.min.js",($version!=null ? $version : "1"));
	}
	
}
