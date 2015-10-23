<?php
class Wsu_Themecontrol_Block_Adminhtml_System_Config_Form_Field_Layout_Preview extends Mage_Adminhtml_Block_System_Config_Form_Field {
    /**
     * Add texture preview
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return String
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element) {
		$element->setHtmlId(str_replace('.','_',$element->getHtmlId()));
        $html        = $element->getElementHtml(); //Default HTML
        $html .= '
		<br/>
		<style>
			.layoutPreview{min-height:70px; position:absolute; min-width:30%; right:0%; top:15px;}
			.layoutPreview .pr-table{display:none;}
			.layoutPreview .pr-table table th, .layoutPreview .pr-table table td {
				border: 1px solid #ddd;
				/*padding: 6px 13px;*/
				text-align: center;
				vertical-align: middle;
			}
			
			
			
			.form-list{position:relative;}
			
			.pr-margin{background-color:#CBE7DE;border: 1px solid #ddd;}
			.pr-padding{background-color:#F3CCFD;border: 1px solid #ddd;}
			
			.pr-table table{background-color:#F7F7F7;}
			.pr-td{background-color:#FFF;}
			
			.pad  td .pr-padding {
				padding: 2em;
			}
			.narrow.pad td .pr-padding{
				padding-left: 1em;
				padding-right: 1em;
			}
			.wide.pad td .pr-padding {
				padding-left: 4em;
				padding-right: 4em;
			}
			.short.pad td .pr-padding{
				padding-top: 1em;
				padding-bottom: 1em;
			}			
			.tall.pad td .pr-padding {
				padding-top: 4em;
				padding-bottom: 4em;
			}
			
			.padded  .wrap.pr-padding {
				padding: 2em;
			}
			.narrow.padded .wrap.pr-padding{
				padding-left: 1em;
				padding-right: 1em;
			}
			.wide.padded .wrap.pr-padding {
				padding-left: 4em;
				padding-right: 4em;
			}
			.short.padded .wrap.pr-padding{
				padding-top: 1em;
				padding-bottom: 1em;
			}			
			.tall.padded .wrap.pr-padding {
				padding-top: 4em;
				padding-bottom: 4em;
			}				
			
		</style>
		
		<div class="layoutPreview" style="">

<div class="pr-table">
<div class="wrap pr-margin"><div class="wrap pr-padding">
<table width="100%" class="row_single">
<tr>
	<th width="100%">.row.single</th>
</tr>
<tr>
	<td width="100%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">12</div></div></div></td>
</tr>
</table></div></div></div>




<div class="pr-table">
<div class="wrap pr-margin"><div class="wrap pr-padding">
<table width="100%" class="row_halves">
<tr>
	<th width="100%" colspan="2">.row.halves</th>
</tr>
<tr>
	<td width="50%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">6</div></div></div></td>
	<td width="50%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">6</div></div></div></td>
</tr>
</table></div></div></div>

<div class="pr-table">
<div class="wrap pr-margin"><div class="wrap pr-padding">
<table width="100%" class="row_thirds">
<tr>
	<th width="100%" colspan="3">.row.thirds</th>
</tr>
<tr>
	<td width="33%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">4</div></div></div></td>
	<td width="34%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">4</div></div></div></td>
	<td width="33%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">4</div></div></div></td>
</tr>
</table></div></div></div>

<div class="pr-table">
<div class="wrap pr-margin"><div class="wrap pr-padding">
<table width="100%" class="row_quarters">
<tr>
	<th width="100%" colspan="4">.row.quarters</th>
</tr>
<tr>
	<td width="25%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">3</div></div></div></td>
	<td width="25%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">3</div></div></div></td>
	<td width="25%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">3</div></div></div></td>
	<td width="25%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">3</div></div></div></td>
</tr>
</table></div></div></div>

<div class="pr-table">
<div class="wrap pr-margin"><div class="wrap pr-padding">
<table width="100%" class="row_side-left">
<tr>
	<th width="100%" colspan="2">.row.side-left</th>
</tr>
<tr>
	<td width="34%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">4</div></div></div></td>
	<td width="66%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">8</div></div></div></td>
</tr>
</table></div></div></div>

<div class="pr-table">
<div class="wrap pr-margin"><div class="wrap pr-padding">
<table width="100%" class="row_side-right">
<tr>
	<th width="100%" colspan="2">.row.side-right</th>
</tr>
<tr>
	<td width="66%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">8</div></div></div></td>
	<td width="34%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">4</div></div></div></td>
</tr>
</table></div></div></div>

<div class="pr-table">
<div class="wrap pr-margin"><div class="wrap pr-padding">
<table width="100%" class="row_margin-left">
<tr>
	<th width="100%" colspan="2">.row.margin-left</th>
</tr>
<tr>
	<td width="25%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">3</div></div></div></td>
	<td width="75%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">9</div></div></div></td>
</tr>
</table></div></div></div>

<div class="pr-table">
<div class="wrap pr-margin"><div class="wrap pr-padding">
<table width="100%" class="row_margin-right">
<tr>
	<th width="100%" colspan="2">.row.margin-right</th>
</tr>
<tr>
	<td width="75%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">9</div></div></div></td>
	<td width="25%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">3</div></div></div></td>
</tr>
</table></div></div></div>

<div class="pr-table">
<div class="wrap pr-margin"><div class="wrap pr-padding">
<table width="100%" class="row_triptych">
<tr>
	<th width="100%" colspan="3">.row.triptych</th>
</tr>
<tr>
	<td width="25%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">3</div></div></div></td>
	<td width="50%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">6</div></div></div></td>
	<td width="25%" bgcolor="gray"><div class="pr-margin"><div class="pr-padding"><div class="pr-td">3</div></div></div></td>
</tr>
</table></div></div></div>



		
		
		</div>
		<script type="text/javascript">
			(function($){
				$(document).ready(function(){
					var layoutselect = $("#' . $element->getHtmlId() . '");
					var _block = layoutselect.closest(".form-list");
					
					var pad_select = _block.find("[name*=\'[padding]\']");
					var pad_flank_select = _block.find("[name*=\'padding_flanks\']");
					var pad_ends_select = _block.find("[name*=\'padding_ends\']");
					
					pad_select.on("change", function() {
						var current = _block.find(".pr-table:visible").data("pad")||"";
						var new_state = pad_select.val();
						
						_block.find(".pr-table").removeClass(current);
						_block.find(".pr-table").addClass(new_state);
						_block.find(".pr-table").data("pad",new_state);
					}).trigger("change");
					
					pad_flank_select.on("change", function() {
						var current = _block.find(".pr-table:visible").data("flank")||"";
						var new_state = pad_flank_select.val();
						
						_block.find(".pr-table").removeClass(current);
						_block.find(".pr-table").addClass(new_state);
						_block.find(".pr-table").data("flank",new_state);
					}).trigger("change");
					
					
					pad_ends_select.on("change", function() {
						var current = _block.find(".pr-table:visible").data("ends")||"";
						var new_state = pad_ends_select.val();
						
						_block.find(".pr-table").removeClass(current);
						_block.find(".pr-table").addClass(new_state);
						_block.find(".pr-table").data("ends",new_state);
					}).trigger("change");

					layoutselect.on("change", function() {
						_block.find(".pr-table").hide();
						_block.find(".row_" + layoutselect.val()).closest(".pr-table").show();
					}).trigger("change");
				});
			})(jQuery);
		</script>
		';
        return $html;
    }
}
