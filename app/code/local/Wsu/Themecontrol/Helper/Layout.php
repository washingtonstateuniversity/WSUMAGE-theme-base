<?php
class Wsu_Themecontrol_Helper_Layout extends Mage_Core_Helper_Abstract {

	/**
	 * Get CSS for grid item based on number of columns
	 *
	 * @param int $columnCount
	 * @return string
	 */
	public function setupLayout( $ref, $extract=array() ) {
		$BlockName = $ref->getNameInLayout();
		$ControllerName = $ref->getRequest()->getControllerName();
		$ActionName = $ref->getRequest()->getActionName();
		$RouteName = $ref->getRequest()->getRouteName();
		$ModuleName = $ref->getRequest()->getModuleName();
		
		$fullpath = $RouteName.'_'.$ControllerName.'_'.$ActionName.'_'.$BlockName;
		echo '<!--';
		var_dump($fullpath);
		echo '-->';
		$theme = $ref->helper('wsu_themecontrol');
		$block_settings = $theme->getCfgLayout($fullpath.'/used');
		$extractables = !empty($extract) ? $extract : array('row_type','padding','padding_flanks','padding_ends');
		$extracted = array();
		foreach($extractables as $name){
			$extracted[$name] = $block_settings ? $theme->getCfgLayout($fullpath.'/'.$name) : '';
		}
		return $extracted;
	}
	
	
	
	
}
