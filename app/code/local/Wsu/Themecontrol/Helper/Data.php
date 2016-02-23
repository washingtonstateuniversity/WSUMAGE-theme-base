<?php
class Wsu_Themecontrol_Helper_Data extends Mage_Core_Helper_Abstract {
    /**
     * Patterns
     *
     * @var array
     */
    protected $_texPath;
    /**
     * Background images
     *
     * @var array
     */
    protected $_bgImagesPath;
	
    /**
     * Sectional Data block
     *
     * @var array
     */
    protected $_sectionalData;
	
    public function __construct() {
        //Create paths
        $this->_texPath      = 'wysiwyg/wsu/themecontrol/_patterns/default/';
        $this->_bgImagesPath = 'wysiwyg/wsu/themecontrol/_backgrounds/';
    }
    // Get theme config (group) /////////////////////////////////////////////////////////////////
    /**
     * Get selected group from the main section (main settings) of the configuration array
     *
     * @return array
     */
    public function getCfgGroup($group, $storeId = NULL) {
        if ($storeId) {
            return Mage::getStoreConfig('wsu_themecontrol/' . $group, $storeId);
		} else {
            return Mage::getStoreConfig('wsu_themecontrol/' . $group);
		}
    }
    /**
     * Get theme's design section from the configuration array
     *
     * @return array
     */
    public function getCfgSectionDesign($storeId = NULL) {
        if ($storeId){
            return Mage::getStoreConfig('wsu_themecontrol_design', $storeId);
		}else{
            return Mage::getStoreConfig('wsu_themecontrol_design');
		}
    }
    /**
     * Get theme's design section from the configuration array
     *
     * @return array
     */
    public function getCfgSectionOverride($storeId = NULL) {
        if ($storeId){
            return Mage::getStoreConfig('wsu_themecontrol_override', $storeId);
		}else{
            return Mage::getStoreConfig('wsu_themecontrol_override');
		}
    }
    // Get theme config /////////////////////////////////////////////////////////////////
	/**
	 * Load a spine settings file value if it exists
	 * @return string
	 */
	public function get_static_layout_settings( $path ){
		$configFile = Mage::getBaseDir('design').DS.'frontend/wsu_base/'.Mage::getSingleton('core/design_package')->getTheme('frontend').'/layout/spine-settings.xml';
		if(file_exists($configFile)){
			$string = file_get_contents($configFile);
			$xml = simplexml_load_string($string, 'Varien_Simplexml_Element');
			$path = '/wsu_spine/' . $path;
			//var_dump( $path );
			//var_dump($xml->xpath( $path ));
			$value = $xml->xpath( $path );
			if( false !== $value && count($value)>0){
				$value=(string)$value[0];	
			}
		}else{
			$value = null;	
		}
		return $value;	
	}
    /**
     * Get theme's main settings (single option)
     *
     * @return string
     */
    public function getCfg($optionString, $storeCode = NULL) {
		$value = $this->get_static_layout_settings( 'wsu_themecontrol/' . $optionString );
		if($value == null){
			$value = Mage::getStoreConfig('wsu_themecontrol/' . $optionString, $storeCode);
		}
        return $value;
    }
    /**
     * Get theme's design settings (single option)
     *
     * @return string
     */
    public function getCfgDesign($optionString, $storeCode = NULL) {
		$value = $this->get_static_layout_settings( 'wsu_themecontrol_design/' . $optionString );
		if($value == null){
			$value = Mage::getStoreConfig('wsu_themecontrol_design/' . $optionString, $storeCode);
		}
        return $value;
    }
    /**
     * Get theme's layout settings (single option)
     *
     * @return string
     */
    public function getCfgLayout($optionString, $storeCode = NULL) {
		$value = $this->get_static_layout_settings( 'wsu_themecontrol_layout/' . $optionString );
		if($value == null){
			$value = Mage::getStoreConfig('wsu_themecontrol_layout/' . $optionString, $storeCode);
		}
        return $value;
    }
    /**
     * Set the data for the css file being rendered
     */	
	public function setCssData( $data ){
		$this->_sectionalData = $data;	
	}
    /**
     * Find the value with in the css data array
	 *
     * @return string
     */	
	public function resolveArrayPath( $path, $default="" ){
		$data = $this->_sectionalData;
		$paths = explode('/',$path);
		$value = "";
		foreach($paths as $path_part){
			$value = $value==''?  isset($data[$path_part]) ? $data[$path_part] : '' : ( isset($value[$path_part]) ? $value[$path_part] : '' );
		}
		return $value==""?$default:$value;
	}
    // Get selected settings /////////////////////////////////////////////////////////////////
	
    /**
     * Get css built rule with checks for data built in
     *
     * @return string
     */
    public function getCssRuleAttr($cssAttr = NULL, $path = NULL, $default='', $append = '' ) {
		$ouput = '';
		if( $cssAttr == NULL || $path == NULL ){
			return $ouput;	
		}
		
		$value = $this->resolveArrayPath( $path, $default );
		if($value!=''){
			if(strpos($cssAttr,"color")!==false){
				if(!$this->isColor($value)){
					return $ouput;	
				}
			}
			$ouput = $cssAttr . ':' . $value . $append;
		}
		return $ouput;	

    }
    /**
     * Get maximum page width from the config
     *
     * @return int
     */
    public function getMaxWidth($storeCode = NULL) {
        $w = $this->getCfgLayout('responsive/max_width', $storeCode);
        if ($w == 'custom') {
            return intval($this->getCfgLayout('responsive/max_width_custom', $storeCode));
        } else {
            return intval($w);
        }
    }
    /**
     * Get custom page width from the config.
     * Custom width is returned only if predefined width was not selected.
     *
     * @return int. Return 0 if predefined width was selected.
     */
    public function getCustomWidth($storeCode = NULL) {
        $w = $this->getCfgLayout('responsive/max_width', $storeCode);
        if ($w == 'custom') {
            return intval($this->getCfgLayout('responsive/max_width_custom', $storeCode));
        } else {
            return 0;
        }
    }
    /**
     * Build the Binder Class String.
     * @return string
     */
    public function getBinderClassStr($storeCode = NULL) {
		if($storeCode == NULL)$storeCode = isset($_SERVER['MAGE_RUN_CODE']) && $_SERVER['MAGE_RUN_CODE']!="general"  ? $_SERVER['MAGE_RUN_CODE'] : NULL;

		$binderClassStr = "";
		$binderClassStr .= $this->getBinderType($storeCode).' ';
		$binderClassStr .= " folio ";
		$width = $this->getCfgLayout('responsive/max_width', $storeCode);
		if($width!='custom')$binderClassStr .= ' max-'.$width ;
		return $binderClassStr;
    }
	

	
    /**
     * Build the Binder Style String.
     * @return string
     */
    public function getBinderStyleStr($storeCode = NULL) {
		if($storeCode == NULL)$storeCode = isset($_SERVER['MAGE_RUN_CODE']) && $_SERVER['MAGE_RUN_CODE']!="general"  ? $_SERVER['MAGE_RUN_CODE'] : NULL;
		
		$width = $this->getCfgLayout('responsive/max_width', $storeCode);
		$binderStyleStr = "";
		if($width=='custom'){
			$width = intval(trim(str_replace('px','',$this->getCfgLayout('responsive/max_width_custom', $storeCode))));
		}
		$binderStyleStr.="max-width:{$width}px;";
		//var_dump($binderStyleStr);
		//die();
		
		return $binderStyleStr;
    }

    /**
     * Build the Binder type.
     * @return string
     */
    public function getBinderType($storeCode = NULL) {
		if($storeCode == NULL)$storeCode = isset($_SERVER['MAGE_RUN_CODE']) && $_SERVER['MAGE_RUN_CODE']!="general"  ? $_SERVER['MAGE_RUN_CODE'] : NULL;
		$type = $this->getCfgLayout('responsive/fluid_width', $storeCode);
		return $type;
    }	
	
	
	
	
    // Background images and textures /////////////////////////////////////////////////////////////////
    /**
     * Get background images directory path
     *
     * @return string
     */
    public function getBgImagesPath() {
        return $this->_bgImagesPath;
    }
    /**
     * Get textures/patterns directory path
     *
     * @return string
     */
    public function getTexPath() {
        return $this->_texPath;
    }
	
    // Other /////////////////////////////////////////////////////////////////
    /**
     * Get alternative image HTML of the given product
     *
     * @param Mage_Catalog_Model_Product	$product		Product
     * @param int							$w				Image width
     * @param int							$h				Image height
     * @param string						$imgVersion		Image version: image, small_image, thumbnail
     * @return string
     */
    public function getAltImgHtml($product, $w, $h, $imgVersion = 'small_image') {
        $column = $this->getCfg('category/alt_image_column');
        $value  = $this->getCfg('category/alt_image_column_value');
        $product->load('media_gallery');
        if ($gal = $product->getMediaGalleryImages()) {
            if ($altImg = $gal->getItemByColumnValue($column, $value)) {
                return '<img class="alt-img" src="' . Mage::helper('wsu/image')->getImg($product, $w, $h, $imgVersion, $altImg->getFile()) . '" alt="' . $product->getName() . '" />';
            }
        }
        return '';
    }
    /**
     * Returns true, if color is specified and the value doesn't equal "transparent"
     *
     * @param string $color color code
     * @return bool
     */
    public function isColor($color) {
        if ($color && $color != 'transparent')
            return true;
        else
            return false;
    }
    /**
     * Get HTML of all child blocks with given ID
     *
     * @param $block Current block object
     * @param string $staticBlockId ID of static blocks
     * @param bool $auto Automatically align static blocks vertically
     * @return string HTML output
     */
    public function getFormattedBlocks($block, $staticBlockId, $auto = true) {
        //Get HTML output of 6 static blocks with ID $staticBlockId<X>, where <X> is a number from 1 to 6
        $colCount = 0; //Number of existing static blocks
        $colHtml  = array(); //Static blocks content
        $html     = ''; //Final HTML output
        for ($i = 1; $i < 7; $i++) {
            if ($tmp = $block->getChildHtml($staticBlockId . $i)) {
                $colHtml[] = $tmp;
                $colCount++;
            }
        }
        if ($colHtml) {
            $gridClass           = '';
            $gridClassBase       = 'grid12-';
            $gridClassPersistent = 'mobile-grid';
            //Get grid unit class
            if ($auto) {
                //Grid units per static block
                $n         = (int) (12 / $colCount);
                $gridClass = $gridClassBase . $n;
            } else
                $gridClass = $gridClassBase . '2';
            for ($i = 0; $i < $colCount; $i++) {
                $classString = $gridClassPersistent . ' ' . $gridClass . ($i == 0 ? ' alpha' : '') . ($i == $colCount - 1 ? ' omega' : '');
                $html .= '<div class="' . $classString . '">';
                $html .= '	<div class="section-space std">' . $colHtml[$i] . '</div>';
                $html .= '</div>';
            }
        }
        return $html;
    }
    /**
     * Returns path of the related products template file
     *
     * @return string
     */
    public function getRelatedProductsTemplate() {
        return $this->getCfg('product_page/related_template');
    }
    /**
     * Get theme's additional body CSS classes
     * Credits: based on part of the PHP CSS Browser Selector by Bastian Allgeier http://bastian-allgeier.de/css_browser_selector
     * which is a php port from Rafael Lima's CSS Browser Selector http://rafael.adm.br/css_browser_selector
     *
     * @return string CSS classes
     */
    public function getThemeBodyClasses() {
        $classes = '';
        if (array_key_exists('HTTP_USER_AGENT', $_SERVER)) {
            $array        = array();
            $userAgentStr = strtolower($_SERVER['HTTP_USER_AGENT']);
            if (!preg_match('/opera|webtv/i', $userAgentStr) && preg_match('/msie\s(\d)/', $userAgentStr, $array)) {
                if ($array[1] >= 6 && $array[1] <= 8) {
                    $classes = 'lte-ie8';
                }
            }
        }
        return $classes;
    }
	
	
	
	public function getWSUbrandColorByName( $name="default", $inverse=false, $mode="rgba", $alpha="1"){
		$map = [
			'default'		=>['rgba' => "rgba(255, 255, 255, ${alpha})",	'hex' => "#ffffff",		'rgba_inverse' => "rgba(42,48,51, ${alpha})",		'hex_inverse' => "#2a3033"],
			'lightest'		=>['rgba' => "rgba(239, 240, 241, ${alpha})",	'hex' => "#eff0f1",		'rgba_inverse' => "rgba(42,48,51, ${alpha})",		'hex_inverse' => "#2a3033"],
			'lighter'		=>['rgba' => "rgba(181, 186, 190, ${alpha})",	'hex' => "#b5babe",		'rgba_inverse' => "rgba(42,48,51, ${alpha})",		'hex_inverse' => "#2a3033"],
			'light'			=>['rgba' => "rgba(141, 149, 154, ${alpha})",	'hex' => "#8d959a",		'rgba_inverse' => "rgba(42,48,51, ${alpha})",		'hex_inverse' => "#2a3033"],
			'gray'			=>['rgba' => "rgba(94, 106, 113, ${alpha})",	'hex' => "#5E6A71",		'rgba_inverse' => "rgba(255, 255, 255, ${alpha})",	'hex_inverse' => "#ffffff"],
			'dark'			=>['rgba' => "rgba(70, 78, 84, ${alpha})",		'hex' => "#464e54",		'rgba_inverse' => "rgba(255, 255, 255, ${alpha})",	'hex_inverse' => "#ffffff"],
			'darker'		=>['rgba' => "rgba(42,48,51, ${alpha})",		'hex' => "#2a3033",		'rgba_inverse' => "rgba(255, 255, 255, ${alpha})",	'hex_inverse' => "#ffffff"],
			'darkest'		=>['rgba' => "rgba(0, 0, 0, ${alpha})",			'hex' => "#000000",		'rgba_inverse' => "rgba(255, 255, 255, ${alpha})",	'hex_inverse' => "#ffffff"],
			'crimson'		=>['rgba' => "rgba(152, 30, 50, ${alpha})",		'hex' => "#981e32",		'rgba_inverse' => "rgba(255, 255, 255, ${alpha})",	'hex_inverse' => "#ffffff"],
			'transparent'	=>['rgba' => "rgba(255, 255, 255, 0)",			'hex' => "transparent",	'rgba_inverse' => "rgba(255, 255, 255, 0)",			'hex_inverse' => "transparent"]
        ];
		return $map[$name][$mode . ( true === $inverse ? "_inverse" : "")];

	}

	
	
	
	
	
}
