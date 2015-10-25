<?php
class Wsu_Themecontrol_Helper_Layout extends Mage_Core_Helper_Abstract {

	/**
	 * Get CSS for grid item based on number of columns
	 *
	 * @param int $columnCount
	 * @return string
	 */
	public function setupLayout( $ref, $extract=array() ) {
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
		foreach($extractables as $name){
			$extracted[$name] = $block_settings ? $theme->getCfgLayout($fullpath.'/'.$name.'_'.$BlockName) : '';
		}
		return $extracted;
	}
	
	public function getMapBlockMapping($block,$values){
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
		if(isset($map[$block])){
			foreach($values as $item){
				if(in_array($item['value'],$map[$block])){
					$used_values[]=$item;
				}
			}
		}else{
			$used_values = $values;
		}
		
		
		return $used_values;	
	}
	
	
}
