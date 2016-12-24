<?php
/**
 * @package		Wsu_Themecontrol
 * @author		Wsu
 * @copyright	Copyright 2012 - 2013 Wsu
 */
$installer = $this;
$installer->startSetup();

//WYSIWYG hidden by default
Mage::getConfig()->saveConfig('cms/wysiwyg/enabled', 'hidden');

Mage::getSingleton('wsu_themecontrol/cssgen_generator')->generateCss('grid',   NULL, NULL);
Mage::getSingleton('wsu_themecontrol/cssgen_generator')->generateCss('layout', NULL, NULL);
Mage::getSingleton('wsu_themecontrol/cssgen_generator')->generateCss('design', NULL, NULL);
Mage::getSingleton('wsu_themecontrol/cssgen_generator')->generateCss('override', NULL, NULL);
Mage::getSingleton('wsu_themecontrol/cssgen_generator')->generateCss('globaljs', NULL, NULL);

$installer->endSetup();
