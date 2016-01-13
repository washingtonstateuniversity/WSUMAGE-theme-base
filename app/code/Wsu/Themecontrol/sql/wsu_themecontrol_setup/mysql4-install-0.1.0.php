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
$installer->addAttribute('catalog_category', 'overview_text',  array(
    'type' => 'varchar',
    'input' => 'text',
    'label'    => 'Replace default "overview" with: ',
    'global'   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'required' => false,
    'default'  => ""
));
$installer->endSetup();
