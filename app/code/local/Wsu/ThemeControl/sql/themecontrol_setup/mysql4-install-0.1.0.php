<?php
/**
 * @package		Wsu_ThemeControl
 * @author		Wsu
 * @copyright	Copyright 2012 - 2013 Wsu
 */
$installer = $this;
$installer->startSetup();

//WYSIWYG hidden by default
Mage::getConfig()->saveConfig('cms/wysiwyg/enabled', 'hidden');

$installer->endSetup();
