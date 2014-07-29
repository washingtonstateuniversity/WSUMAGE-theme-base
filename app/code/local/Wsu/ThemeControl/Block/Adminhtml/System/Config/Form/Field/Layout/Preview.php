<?php
class Wsu_ThemeControl_Block_Adminhtml_System_Config_Form_Field_Layout_Preview extends Mage_Adminhtml_Block_System_Config_Form_Field {
    /**
     * Add texture preview
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return String
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element) {
        $html        = $element->getElementHtml(); //Default HTML
        $html .= '
		<br/>
		<style>
		#layoutPreview{}
		#layoutPreview table{display:none;}
		</style>
		
		<div id="layoutPreview" style="">

<table width="100%" id="row_single">
<tr>
	<th width="100%">.row.single</th>
</tr>
<tr>
	<td width="100%" bgcolor="gray">12</td>
</tr>
</table>

<table width="100%" id="row_halves">
<tr>
	<th width="100%" colspan="2">.row.halves</th>
</tr>
<tr>
	<td width="50%" bgcolor="gray">6</td>
	<td width="50%" bgcolor="gray">6</td>
</tr>
</table>

<table width="100%" id="row_thirds">
<tr>
	<th width="100%" colspan="3">.row.thirds</th>
</tr>
<tr>
	<td width="33%" bgcolor="gray">4</td>
	<td width="34%" bgcolor="gray">4</td>
	<td width="33%" bgcolor="gray">4</td>
</tr>
</table>

<table width="100%" id="row_quarters">
<tr>
	<th width="100%" colspan="4">.row.quarters</th>
</tr>
<tr>
	<td width="25%" bgcolor="gray">3</td>
	<td width="25%" bgcolor="gray">3</td>
	<td width="25%" bgcolor="gray">3</td>
	<td width="25%" bgcolor="gray">3</td>
</tr>
</table>

<table width="100%" id="row_side-left">
<tr>
	<th width="100%" colspan="2">.row.side-left</th>
</tr>
<tr>
	<td width="34%" bgcolor="gray">4</td>
	<td width="66%" bgcolor="gray">8</td>
</tr>
</table>

<table width="100%" id="row_side-right">
<tr>
	<th width="100%" colspan="2">.row.side-right</th>
</tr>
<tr>
	<td width="66%" bgcolor="gray">8</td>
	<td width="34%" bgcolor="gray">4</td>
</tr>
</table>

<table width="100%" id="row_margin-left">
<tr>
	<th width="100%" colspan="2">.row.margin-left</th>
</tr>
<tr>
	<td width="25%" bgcolor="gray">3</td>
	<td width="75%" bgcolor="gray">9</td>
</tr>
</table>

<table width="100%" id="row_margin-right">
<tr>
	<th width="100%" colspan="2">.row.margin-right</th>
</tr>
<tr>
	<td width="75%" bgcolor="gray">9</td>
	<td width="25%" bgcolor="gray">3</td>
</tr>
</table>

<table width="100%" id="row_triptych">
<tr>
	<th width="100%" colspan="3">.row.triptych</th>
</tr>
<tr>
	<td width="25%" bgcolor="gray">3</td>
	<td width="50%" bgcolor="gray">6</td>
	<td width="25%" bgcolor="gray">3</td>
</tr>
</table>



		
		
		</div>
		<script type="text/javascript">
			(function($){
				$(document).ready(function(){
					var layoutselect = $("#' . $element->getHtmlId() . '");
					layoutselect.on("change", function() {
						$("#layoutPreview").hide();
						$("row_" + layoutselect.val()).show();
					});
				});
			})(jQuery);
		</script>
		';
        return $html;
    }
}
