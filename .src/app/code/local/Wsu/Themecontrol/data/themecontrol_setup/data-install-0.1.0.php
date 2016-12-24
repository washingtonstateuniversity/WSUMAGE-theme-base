<?php
/**
 * @package         Wsu_Themecontrol
 * @author      Wsu
 * @copyright   Copyright 2012 - 2013 Wsu
 */
$installer = $this;
$installer->startSetup();

//WYSIWYG hidden by default
Mage::getConfig()->saveConfig('cms/wysiwyg/enabled', 'hidden');

Mage::getSingleton('wsu_themecontrol/cssgen_generator')->generateCss('grid', null, null);
Mage::getSingleton('wsu_themecontrol/cssgen_generator')->generateCss('layout', null, null);
Mage::getSingleton('wsu_themecontrol/cssgen_generator')->generateCss('design', null, null);
Mage::getSingleton('wsu_themecontrol/cssgen_generator')->generateCss('override', null, null);
Mage::getSingleton('wsu_themecontrol/cssgen_generator')->generateCss('globaljs', null, null);

$installer->endSetup();
