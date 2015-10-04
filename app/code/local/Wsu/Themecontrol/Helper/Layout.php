<?php
class Wsu_Themecontrol_Helper_Layout extends Mage_Core_Helper_Abstract {

	/**
	 * Get CSS for grid item based on number of columns
	 *
	 * @param int $columnCount
	 * @return string
	 */
	public function setupLayout( $ref, $extract=array() ) {
		$blockname = $ref->getNameInLayout();
		
		$blockname = $ref->getNameInLayout();
		$theme = $ref->helper('wsu_themecontrol');
		$block_settings = $theme->getCfgLayout($blockname.'/used');
		$extractables = !empty($extract) ? $extract : array('row_type','padding','padding_flanks','padding_ends');
		$extracted = array();
		foreach($extractables as $name){
			$extracted[$name] = $block_settings ? $theme->getCfgLayout($blockname.'/'.$name) : '';
		}
		return $extracted;
	}
}
