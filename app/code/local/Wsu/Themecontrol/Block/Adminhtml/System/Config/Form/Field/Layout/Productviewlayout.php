<?php
class Wsu_Themecontrol_Block_Adminhtml_System_Config_Form_Field_Layout_Productviewlayout extends Mage_Adminhtml_Block_System_Config_Form_Field {
	
	protected function _makeOptionDropdown($name,$type){
		$types = Mage::getModel('wsu_themecontrol/system_Config_source_layout_flexwork_'.$type)->toOptionArray();
		$html = '<select name="'.$name.'" class="flextype">';
		foreach($types as $option){
			$html .= '<option value="'.$option['value'].'">'.$option['label'].'</option>';
		}
		$html .= '</select>';
		return $html;
	}
	
	
	
	
	
    /**
     * Add texture preview
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return String
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element) {
		$used_values = $this->helper('wsu_themecontrol/layout')
			->getMapBlockMapping(str_replace('.','_',$element->getHtmlId()),$element->getValues());
			
		$element->setHtmlId(str_replace('.','_',$element->getHtmlId()));
		$element->setValues($used_values);
        $html        = $element->getElementHtml(); //Default HTML
		
		$html_id = str_replace('.','_',$element->getHtmlId());
		$html_id_stub = explode('_row_type_',str_replace('.','_',$html_id));
		$html_id_stub = isset($html_id_stub[1])?$html_id_stub[1]:'';
		$url = $this->helper('wsu_themecontrol/layout')->_testProductPage();

        $html .= '
		<br/>
		<style>
			#' . $html_id . '{
				display:none;
			}
			.layoutframeworkPreview{
				min-height: 70px;
				max-width: 100%;
				border: 1px solid #000;
				position: relative;
				box-sizing: border-box;
				max-height: 750px;
				zoom: .50;
			}
			/*.fake_spine{
				position: absolute;
				top: 0;
				bottom: 0;
				width: 198px;
				background-color: #981e32;
				box-sizing: border-box;
				left: 25px;
			}
			.fake_spine #wsu-signature {
				background-image: url(https://repo.wsu.edu/spine/1/marks/wsu-signature-vertical-white.svg);
			}
			#wsu-signature {
				background-repeat: no-repeat;
				background-position: center center;
				background-size: 150px auto;
				background-color: transparent;
				height: 155px;
				display: block;
				text-indent: 120%;
				overflow: hidden;
				white-space: nowrap;
				position: relative;
				z-index: 99;
			}
			.fake_page{
				padding-left: calc(198px + 30px);
				box-sizing: border-box;
				overflow-x: auto;
				max-height: 748px;
				padding-right: 25px;
			}*/
		</style>
		<div style="display:none;">
			<div class="type_show"><select><option value="true">yes</option><option value="false">no</option></select></div>
			<div class="type_type">'.$this->_makeOptionDropdown('**type_temp**','type').'</div>
			<div class="type_justification">'.$this->_makeOptionDropdown('**type_temp**','justification').'</div>
			<div class="type_wrap">'.$this->_makeOptionDropdown('**type_temp**','wrap').'</div>
			<div class="type_size">'.$this->_makeOptionDropdown('**type_temp**','size').'</div>
			<div class="type_content_alignment">'.$this->_makeOptionDropdown('**type_temp**','contentalignment').'</select></div>
			<div class="type_item_alignment">'.$this->_makeOptionDropdown('**type_temp**','itemalignment').'</div>
			
			<div class="type_media-query-size">'.$this->_makeOptionDropdown('**type_temp**','mediaquerysize').'</select></div>
			<div class="type_media-query-type">'.$this->_makeOptionDropdown('**type_temp**','mediaquerytype').'</select></div>
			<div class="type_hideat">'.$this->_makeOptionDropdown('**type_temp**','hideat').'</select></div>
			<div class="type_order">'.$this->_makeOptionDropdown('**type_temp**','order').'</div>
		</div>
		<!--<link rel="stylesheet" type="text/css" href="/skin/adminhtml/default/default/wsu/css/_layout_preview.css" media="print" />-->
		<i><b>NOTE:</b> preview is 1:2</i><br/>
		<!--<div class="layoutframeworkPreview '. ($html_id!=''?''.$html_id.' ':'') .'">
			
		</div>-->
		
		<iframe 
		class="layoutframeworkPreview '. $html_id .'" 
		name="layoutframeworkPreview_'. $html_id .'" 
		id="layoutframeworkPreview_'. $html_id .'" 
		src="'.$url.'" 
		frameborder="0" 
		width="660" 
		height="450" 
		style="width:100% !important;height: 1250px !important;max-width:100% !important;max-height: 1250px !important;"></iframe>

		<script type="text/javascript">
			(function($){

				var _layout = {};
				var settings_default = {
					"parent":{
						"show":"true",
						"hideat":"",
						"type": "flex-row",
						"media-query-type": "column-at-480",
						"size": "thirds-3",
						"media-query-size": "",
						"justification":"justify-start",
						"content_alignment":"content-start"
					},
					"child":{
						"show":"true",
						"hideat":"",
						"size": "thirds-3",
						"order": "order-1",
						"media-query-size": "",
						"item_alignment":"items-start"
					}
					
				};
		
				function cleanTarget(target,callback){
					var clearOf = ["grid-", "justify-", "flex-", "order-", "full-width-", "thirds-", "fours-", "fifths-", "sixths-", "eigths-", "ninths-", "tenths-", "twelfths-", "wrap", "space-", "center", "column-", "row-", "hide-below-"];
					$.each(clearOf,function(i,val){
						target.stripClass(val,false);
					});callback();
					
					/*$.when.apply($, $.map(clearOf, function(idx,val) {
						target.stripClass(val,false);
					})).done(function() {
						callback();
					});*/
				}
				
				var _root = $(".' . $html_id . '");
				function _layoutItOut(root_obj,_data){
					$.each(_data,function(idx,val){
						
						
						
						var target = $("iframe#layoutframeworkPreview_'. $html_id .'").contents().find("." + idx);
						console.log(target);
						if( target.length > 0 ){
							target.addClass("sortable");
							cleanTarget(target,function(){
								var _show = "true";
								if( "undefined" !== typeof val.settings ){
									if( ( "undefined" !== typeof val.settings.show ) ){
										_show = "" + ("false" !== val.settings.show );
									}
									if("false" === _show){
										target.hide();
									}else{
										target.show();
										var _classes = "";
										$.each( val.settings, function( setting_idx, setting ){
											if("show" !== setting_idx){
												_classes += " " + setting;
											}
											if("size" === setting_idx){
												_classes += " grid-part " + setting;
											}
										});
										target.addClass(_classes);
									}
								}
								if("undefined" !== typeof val.children){
									_layoutItOut(root_obj,val.children);
								}
							});
						}
					});
					
					$("#product_view_options li").off( "mouseenter mouseleave" );
					$("#product_view_options li").hover(function(){
						var _class = $(this).data("block");
						$(".product-view ."+_class).addClass("hovering");
					}, function(){
						$(".hovering").removeClass("hovering");
					});
				}
				
				function _createInputForm( _data, path ){
					
					//console.log( "-------- defaults " );
					//	console.log( settings_default.child );
					//	console.log( settings_default.parent );
					//console.log( "-------- defaults " );
					
					path = path || "";
					var html = "<ul id=\'product_view_options\'>";
					//console.log( _data );
					var _settings = {};
					$.each(_data,function(idx,val){
						_settings = {};
						html += "<li data-block=\'"+idx+"\'><b>"+idx+"</b>";
							if( "undefined" !== typeof val.settings ){
									var parent = "";
									if( "product_info" !== idx && "undefined" !== typeof val.children){
										html += "<span class=\'parent_option\'>Options</span>";
										parent = "parent";
									}
									html += "<dl class=\'"+parent+"\'>";
									
									//console.log( "---->> before " );
									//console.log( val.settings );
									if( "product_info" !== idx ){
										var child = settings_default.child;
										_settings = $.extend({},child,val.settings);
										if("undefined" !== typeof val.children){
											var parent = settings_default.parent;
											_settings = $.extend({},parent,_settings);
										}
									}
									//console.log( _settings );
									
									//console.log( "----<< after " );
									
									$.each( _settings, function( setting_idx, setting ){
										html += "<dt>"+setting_idx+"</dt>";
										var currentpath = (path !== "" ? path+"." : "" ) + idx + ".settings." + setting_idx;
										//console.log( ">>" + setting_idx + "=" + setting );
										$(".type_" + setting_idx).find(":selected").attr("selected",false);
										$(".type_" + setting_idx).find(":selected").removeAttr("selected");
										$(".type_" + setting_idx).find("[value=\'" + setting + "\']").attr("selected",true);
										
										var input = $(".type_"+setting_idx).html();
										html += "<dd data-classes=\'" + setting_idx + "\' data-path=\'" + currentpath + "\'>" + input + "</dd>";
									});
									html += "</dl>";
							}
							if("undefined" !== typeof val.children){
								var passingpath = (path !== "" ? path+"." : "" ) + idx+".children";
								html += _createInputForm( val.children, passingpath );
							}
						html += "</li>";
					});
					html += "</ul>"; 
					return html;
				}

				function set(path, value) {
					var schema = _layout;  // a moving reference to internal objects within obj
					var pList = path.split(".");
					var len = pList.length;
					for(var i = 0; i < len-1; i++) {
						var elem = pList[i];
						if( !schema[elem] ) schema[elem] = {}
						schema = schema[elem];
					}
				
					schema[pList[len-1]] = value;
				}

				function _updateLayout(_data){
					$("#product_view_options li").each(function(idx,val){
						$(this).children("dl").find("dd").each(function(idx,val){
							var path = $(this).data("path");
							var value = $(this).find(":input").val();
							set(path,value);
						});
					});
					_layoutItOut(_root,_layout);
					$("#' . $html_id . '").val(JSON.stringify(_layout));
					/*$.when.apply($, $.map($("#product_view_options li"), function() {
						$(this).children("dl").find("dd").each(function(idx,val){
							var path = $(this).data("path");
							var value = $(this).find(":input").val();
							set(path,value);
						});
					})).done(function() {
						
					});*/
					
					
					
				}

				$(document).ready(function(){
					$("#' . $html_id . '").closest("td").css("width","85%");
					$("#' . $html_id . '").hide();
					_layout = {
						"product_info": {
							"settings":{},
							"children":{
								"product-essential": {
									"settings":{
										"type": "flex-row",
										"media-query-type": "column-at-480",
									},
									"children":{
										"product-content": {
											"settings":{
												"type": "flex-column",
												"size": "fifths-3",
												"order": "order-1",
												"media-query-size": "full-width-at-480",
											},
											"children":{
												"product-name": {
													"settings":{
														"show":"false"
													}
												},
												"email_area": {
													"settings":{
														"order": "order-8"
													}
												},
												"review_area": {
													"settings":{
														"order": "order-9"
													}
												},
												"alert_urls_area": {
													"settings":{
														"order": "order-7"
													}
												},
												"product_type_data_area": {
													"settings":{
														"order": "order-3"
													}
												},
												"tier_price_area": {
													"settings":{
														"order": "order-4"
													}
												},
												"extrahint_area": {
													"settings":{
														"order": "order-5"
													}
												},
												"short_description_area": {
													"settings":{
														"order": "order-1"
													}
												},
												"other_area": {
													"settings":{
														"type": "flex-column",
														"order": "order-6"
													}
												},
												"add_to_box": {
													"settings":{
														"type": "flex-column",
														"order": "order-6"
													}
												},
												"container1_area": {
													"settings":{
														"order": "order-2"
													},
													"children":{
														"product-options":{
															"settings":{
																"order": "order-1"
															}
														},
														"product-options-bottom":{
															"settings":{
																"order": "order-2"
															}
														}
													}
												},
												"description_area": {
													"settings":{
														"order": "order-10"
													}
												},
											}
										},
										"product_info_media": {
											"settings":{
												"size": "fifths-2",
												"order": "order-2",
												"media-query-size": "full-width-at-480",
												"type": "flex-row"
											},
											"children":{
												"product-image": {
													"settings":{
														"size": "sixths-5",
														"order": "order-2"
													}
												},
												"more-views": {
													"settings":{
														"size": "sixths-1",
														"order": "order-1"
													},
													"children":{
														"more-views-imgs": {
															"settings":{
																"type": "flex-column"
															}
														}
													}
												}
											}
										}
									}
					
								},
								"product-collateral":{
					
								}
							}
						}
					};
						
						

						
						
					if($("#' . $html_id . '").val() !== ""){
						try {
							var str	= $("#' . $html_id . '").val();
							var obj = JSON.parse(str); // this is how you parse a string into JSON 
							_layout = obj;
						} catch (ex) {
							console.error(ex);
						}
					}
					$("#row_' . $html_id . ' td.label").html( _createInputForm( _layout, "" ) );
					
					$("#product_view_options b").siblings("span").hide();
					$("#product_view_options b").siblings("dl").hide();
					$("#product_view_options b").siblings("ul").hide();
					$("#product_view_options b").off().on("click",function(){
						$(this).siblings("dl:not(.parent)").toggle();
						$(this).siblings("ul").toggle();
						$(this).siblings("span").toggle();
						
						$(this).toggleClass("open","close");
						if( ! $(this).is(".open") ){
							$(this).siblings(".parent_option").hide();
							$(this).siblings(".parent").hide();
						}
						
					});
					
					$("#product_view_options .parent_option").off().on( "click", function(){
						$(this).siblings(".parent").toggle();
						$(this).toggleClass("open", "close");
					});
					
					
					$("iframe#layoutframeworkPreview_'. $html_id .'").on("load", function(){
						$("iframe#layoutframeworkPreview_'. $html_id .'").contents().find("head")
							.append("<meta name=\'viewport\' content=\'width=device-width, initial-scale=0.5\'/>");
							_layoutItOut(_root, _layout);
						$("#product_view_options :input").on( "change", function(){ _updateLayout(_layout); } );
					});
					
					
				});
			}(jQuery));
		</script>
		';
        return $html;
    }
}
