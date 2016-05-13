<?php
class Wsu_Themecontrol_Helper_Data extends Mage_Core_Helper_Abstract
{
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
	
    public function __construct()
	{
        //Create paths
        $this->_texPath      = 'wysiwyg/wsu/themecontrol/_patterns/default/';
        $this->_bgImagesPath = 'wysiwyg/wsu/themecontrol/_backgrounds/';
    }
    // Get theme config (group) /////////////////////////////////////////////////////////////////
    /**
     * try to resolve the store code if not set or is NULL
     *
     * @return string or NULL
     */
	public function resoloveStoreCode($storeCode=NULL)
	{
		if ( NULL === $storeCode && isset($_SERVER['MAGE_RUN_CODE']) && "general" !== $_SERVER['MAGE_RUN_CODE'] ){
			$storeCode = $_SERVER['MAGE_RUN_CODE'] ;
		}
		return $storeCode;
	}
	
	
    /**
     * Get selected group from the main section (main settings) of the configuration array
     *
     * @return array
     */
    public function getCfgGroup($group, $storeId = NULL)
	{
        if (NULL !== $storeId) {
            return Mage::getStoreConfig('wsu_themecontrol/' . $group, $storeId);
		} else {
            return Mage::getStoreConfig('wsu_themecontrol/' . $group);
		}
    }
    
    // Get theme config /////////////////////////////////////////////////////////////////
	/**
	 * Load a spine settings file value if it exists
	 * @return string
	 */
	public function get_static_layout_settings( $path , $storeCode = NULL)
	{
        $use_settings_file = Mage::getStoreConfig('wsu_themecontrol/general/use_settings_file', $storeCode);

        if($use_settings_file){
            $configFile = Mage::getBaseDir('design').DS.'frontend/wsu_base/'.Mage::getSingleton('core/design_package')->getTheme('frontend').'/layout/spine-settings.xml';
            if (file_exists($configFile)){
                $string = file_get_contents($configFile);
                $xml = simplexml_load_string($string, 'Varien_Simplexml_Element');
                $path = '/wsu_spine/' . $path;
                $value = $xml->xpath( $path );
                if (false !== $value && !empty($value)){
                    $value=(string)$value[0];	
                }else{
                    $value = null;	
                }
            } else {
                $value = null;	
            }
        } else {
			$value = null;	
		}
		return $value;	
	}
    
    
/**
     * Get theme's design section from the configuration array
     *
     * @return array
     */
    public function getCfgSection($section, $storeId = NULL)
	{
        $_adminSettings = [];
        if (NULL !== $storeId){
            $_adminSettings = Mage::getStoreConfig('wsu_themecontrol_'.$section, $storeId);
		} else {
            $_adminSettings = Mage::getStoreConfig('wsu_themecontrol_'.$section);
		}
        foreach ($_adminSettings as $group=>$items) {
            foreach ($items as $name=>$value) {
               $path = 'wsu_themecontrol_'.$section.'/'.$group.'/'.$name;
               $optionalValue = $this->get_static_layout_settings( $path );
               if (NULL !== $optionalValue) {
                   $_adminSettings[$group][$name] = $optionalValue;
               }
            }  
        }
        return $_adminSettings;
    }
    
    
    
    
    /**
     * Get theme's design section from the configuration array
     *
     * @return array
     */
    public function getCfgSectionDesign($storeId = NULL)
	{
        $_adminSettings = $this->getCfgSection('design', $storeId);
        return $_adminSettings;
    }
    /**
     * Get theme's design section from the configuration array
     *
     * @return array
     */
    public function getCfgSectionEffects($storeId = NULL)
	{
        $_adminSettings = $this->getCfgSection('effects', $storeId);
        return $_adminSettings;
    }
    /**
     * Get theme's design section from the configuration array
     *
     * @return array
     */
    public function getCfgSectionOverride($storeId = NULL)
	{
        $_adminSettings = $this->getCfgSection('override', $storeId);
        return $_adminSettings;        
    }
    
    /**
     * Get theme's design section from the configuration array
     *
     * @return array
     */
    public function getCfgSectionGlobaljs($storeId = NULL)
	{
        $_adminSettings = $this->getCfgSection('globaljs', $storeId);
        return $_adminSettings;        
    }
    
    
    /**
     * Get theme's main settings (single option)
     *
     * @return string
     */
    public function getCfg($optionString, $storeCode = NULL)
	{
		$storeCode = $this->resoloveStoreCode($storeCode);
		
		$value = $this->get_static_layout_settings( 'wsu_themecontrol/' . $optionString );
		if (NULL === $value){
			$value = Mage::getStoreConfig('wsu_themecontrol/' . $optionString, $storeCode);
		}
        return $value;
    }
    /**
     * Get theme's design settings (single option)
     *
     * @return string
     */
    public function getCfgDesign($optionString, $storeCode = NULL)
	{
		$storeCode = $this->resoloveStoreCode($storeCode);
		
		$value = $this->get_static_layout_settings( 'wsu_themecontrol_design/' . $optionString );
		if (NULL === $value){
			$value = Mage::getStoreConfig('wsu_themecontrol_design/' . $optionString, $storeCode);
		}
        return $value;
    }
    /**
     * Get theme's design settings (single option)
     *
     * @return string
     */
    public function getCfgEffects($optionString, $storeCode = NULL)
	{
		$storeCode = $this->resoloveStoreCode($storeCode);
		
		$value = $this->get_static_layout_settings( 'wsu_themecontrol_effects/' . $optionString );
		if (NULL === $value){
			$value = Mage::getStoreConfig('wsu_themecontrol_effects/' . $optionString, $storeCode);
		}
        return $value;
    }
    /**
     * Get theme's layout settings (single option)
     *
     * @return string
     */
    public function getCfgLayout($optionString, $storeCode = NULL)
	{
		$storeCode = $this->resoloveStoreCode($storeCode);
		
		$value = $this->get_static_layout_settings( 'wsu_themecontrol_layout/' . $optionString );
		if (NULL === $value){
			$value = Mage::getStoreConfig('wsu_themecontrol_layout/' . $optionString, $storeCode);
		}
        return $value;
    }
    /**
     * Set the data for the css file being rendered
     */	
	public function setCssData($data)
	{
		$this->_sectionalData = $data;	
	}
    /**
     * Find the value with in the css data array
	 *
     * @return string
     */	
	public function resolveArrayPath($path, $default="")
	{
		$data = $this->_sectionalData;
		$paths = explode('/',$path);
		$value = "";
		foreach($paths as $path_part){
			$value = '' === $value ?  (isset($data[$path_part]) ? $data[$path_part] : '') : ( isset($value[$path_part]) ? $value[$path_part] : '' );
		}
		return ""===$value?$default:$value;
	}
    // Get selected settings /////////////////////////////////////////////////////////////////
	
    /**
     * Get css built rule with checks for data built in
     *
     * @return string
     */
    public function getCssRuleAttr($cssAttr = NULL, $path = NULL, $default='', $append = '' )
	{
		$ouput = '';
		if (NULL === $cssAttr || NULL === $path){
			return $ouput;	
		}
		
		$value = $this->resolveArrayPath( $path, $default );
		if ('' !== $value){
			if (false !== strpos($cssAttr,"color")){
				if (!$this->isColor($value)){
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
    public function getMaxWidth($storeCode = NULL)
	{
		$storeCode = $this->resoloveStoreCode($storeCode);
		
        $w = $this->getCfgLayout('responsive/max_width', $storeCode);
        if ('custom' === $w) {
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
    public function getCustomWidth($storeCode = NULL)
	{
		$storeCode = $this->resoloveStoreCode($storeCode);
		
        $w = $this->getCfgLayout('responsive/max_width', $storeCode);
        if ('custom' === $w) {
            return intval($this->getCfgLayout('responsive/max_width_custom', $storeCode));
        } else {
            return 0;
        }
    }
    /**
     * Build the Binder Class String.
     * @return string
     */
    public function getBinderClassStr($storeCode = NULL)
	{
		$storeCode = $this->resoloveStoreCode($storeCode);
		
		$binderClassStr = "";
		$binderClassStr .= $this->getBinderType($storeCode).' ';
		$binderClassStr .= " folio ";
		$width = $this->getCfgLayout('responsive/max_width', $storeCode);
		if ('custom' !== $width){
			$binderClassStr .= ' max-'.$width ;
		}
		return $binderClassStr;
    }
	

	
    /**
     * Build the Binder Style String.
     * @return string
     */
    public function getBinderStyleStr($storeCode = NULL)
	{
		$storeCode = $this->resoloveStoreCode($storeCode);
		
		$width = $this->getCfgLayout('responsive/max_width', $storeCode);
		$binderStyleStr = "";
		if ('custom' === $width){
			$width = intval(trim(str_replace('px','',$this->getCfgLayout('responsive/max_width_custom', $storeCode))));
		}
		$binderStyleStr.="max-width:{$width}px;";
		
		return $binderStyleStr;
    }

    /**
     * Build the Binder type.
     * @return string
     */
    public function getBinderType($storeCode = NULL)
	{
		$storeCode = $this->resoloveStoreCode($storeCode);
		
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
    public function getTexPath()
	{
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
    public function getAltImgHtml($product, $w, $h, $imgVersion = 'small_image')
	{
        $column = $this->getCfg('category/alt_image_column');
        $value  = $this->getCfg('category/alt_image_column_value');
        $product->load('media_gallery');
        if ($gal = $product->getMediaGalleryImages()){
            if ($altImg = $gal->getItemByColumnValue($column, $value)){
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
    public function isColor($color)
	{
        if ($color && 'transparent' !== $color){
            return true;
		} else {
            return false;
		}
    }
    /**
     * Get HTML of all child blocks with given ID
     *
     * @param $block Current block object
     * @param string $staticBlockId ID of static blocks
     * @param bool $auto Automatically align static blocks vertically
     * @return string HTML output
     */
    public function getFormattedBlocks($block, $staticBlockId, $auto = true)
	{
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
            } else {
                $gridClass = $gridClassBase . '2';
			}
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
    public function getRelatedProductsTemplate()
	{
        return $this->getCfg('product_page/related_template');
    }
    /**
     * Get theme's additional body CSS classes
     * Credits: based on part of the PHP CSS Browser Selector by Bastian Allgeier http://bastian-allgeier.de/css_browser_selector
     * which is a php port from Rafael Lima's CSS Browser Selector http://rafael.adm.br/css_browser_selector
     *
     * @return string CSS classes
     */
    public function getThemeBodyClasses()
	{
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

        $reverse = $this->getCfgEffects("effects/general_reverse_on_beforeunload");
        if($reverse){
            $classes .= ' reverse ';
        }
        
        
        
        
        
        return $classes;
    }
	
	
	
	public function getWSUbrandColorByName($name="default", $inverse=false, $mode="rgba", $alpha="1")
	{
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

	public function showAdminFrontEndBar()
	{
		// should first check options on if it is allowed
		$loggedIn = false;
		$userName = "";
		$switchSessionName = 'adminhtml';
		$currentSessionId = Mage::getSingleton('core/session')->getSessionId();
		$currentSessionName = Mage::getSingleton('core/session')->getSessionName();
		if ($currentSessionId && $currentSessionName && isset($_COOKIE[$currentSessionName])) {
			if ( isset($_COOKIE[$switchSessionName]) ){
				$switchSessionId = $_COOKIE[$switchSessionName];
				$this->_switchSession($switchSessionName, $switchSessionId);
				// Now you are in admin session. Get all the details you want using the below format:
				// $whateverData = Mage::getModel('mymodule/session')->getWhateverData();
				// To print the username and id of the admin logged in, you would use this:
				$adminSession = Mage::getModel('admin/session');
				if ($adminSession){
					$user = Mage::getModel('admin/session')->getUser();
					if ($user){
						$loggedIn = true;
						$userName = $user->getUsername();
						$userId = $user->getId();
					}
				}
				$this->_switchSession($currentSessionName, $currentSessionId);
			}
		}
		return ($loggedIn ? "admin/admin_bar.phtml" : "");
	}
	
	protected function _switchSession($namespace, $id = null)
	{
		session_write_close();
		$GLOBALS['_SESSION'] = null;
		$session = Mage::getSingleton('core/session');
		if ($id) {
			$session->setSessionId($id);
		}
		$session->start($namespace);
	}	
	
	
}
