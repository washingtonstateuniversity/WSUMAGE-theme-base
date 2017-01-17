<?php
class Wsu_Themecontrol_Helper_Cssgen extends Mage_Core_Helper_Abstract
{
    /**
     * Path and directory of the automatically generated CSS
     *
     * @var string
     */
    protected $_generatedCssFolder;
    protected $_generatedCssPath;
    protected $_generatedCssDir;
    protected $_templatePath;
    
    public function __construct()
    {
        //Create paths
        $this->_generatedCssFolder = 'css/_config/';
        $this->_generatedCssPath   = 'frontend/wsu_base/default/' . $this->_generatedCssFolder;
        $this->_generatedCssDir    = Mage::getBaseDir('skin') . '/' . $this->_generatedCssPath;
        $this->_templatePath = 'wsu/themecontrol/css/';
    }
    /**
     * Get automatically generated CSS directory
     *
     * @return string
     */
    public function getGeneratedCssDir()
    {
        return $this->_generatedCssDir;
    }
    /**
     * Get path to CSS template
     *
     * @return string
     */
    public function getTemplatePath()
    {
        return $this->_templatePath;
    }
 
    /**
     * Get file path: CSS grid
     *
     * @return string
     */
    public function getGridFile()
    {
        return $this->_generatedCssFolder . 'grid_' . Mage::app()->getStore()->getCode() . '.css';
    }
    /**
     * Get file path: CSS layout
     *
     * @return string
     */
    public function getLayoutFile()
    {
        return $this->_generatedCssFolder . 'layout_' . Mage::app()->getStore()->getCode() . '.css';
    }
    /**
     * Get file path: CSS design
     *
     * @return string
     */
    public function getDesignFile()
    {
        return $this->_generatedCssFolder . 'design_' . Mage::app()->getStore()->getCode() . '.css';
    }
    /**
     * Get file path: CSS Override
     *
     * @return string
     */
    public function getOverrideFile()
    {
        return $this->_generatedCssFolder . 'override_' . Mage::app()->getStore()->getCode() . '.css';
    }
    
    /**
     * Get file path: CSS Override
     *
     * @return string
     */
    public function getGlobalJSFile()
    {
        return $this->_generatedCssFolder . 'globaljs_' . Mage::app()->getStore()->getCode() . '.js';
    }
}
