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
		

        $html .= '
		<br/>
		<style>
			.layoutframeworkPreview{
				min-height: 70px;
				max-width: 100%;
				border: 1px solid #000;
				position: relative;
				box-sizing: border-box;
				max-height: 750px;
				zoom: .50;
			}
			.fake_spine{
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
			}
		</style>
		<div style="display:none;">
			<div class="type_show"><select><option value="true">yes</option><option value="false">no</option></select></div>
			<div class="type_type">'.$this->_makeOptionDropdown('**type_temp**','type').'</div>
			<div class="type_justification">'.$this->_makeOptionDropdown('**type_temp**','spacing').'</div>
			<div class="type_wrap">'.$this->_makeOptionDropdown('**type_temp**','wrap').'</div>
			<div class="type_size">'.$this->_makeOptionDropdown('**type_temp**','size').'</div>
			<div class="type_content_alignment"><select><option value=""></option></select></div>
			<div class="type_item_alignment"><select><option value=""></option></select></div>
			
			<div class="type_media-query-size"><select><option value="full-width-at-480">full-width-at-480</option></select></div>
			<div class="type_media-query-type"><select><option value="column-at-480">column-at-480</option></select></div>
			<div class="type_order"><select><option value="order-1">order-1</option><option value="order-2">order-2</option><option value="order-3">order-3</option><option value="order-4">order-4</option><option value="order-5">order-5</option><option value="order-6">order-6</option><option value="order-7">order-7</option><option value="order-8">order-8</option><option value="order-9">order-9</option><option value="order-10">order-10</option><option value="order-11">order-11</option><option value="order-12">order-12</option></select></div>
		</div>
		<link rel="stylesheet" type="text/css" href="/skin/adminhtml/default/default/wsu/css/_layout_preview.css" media="print" />
		<i><b>NOTE:</b> preview is 1:2</i>
		<div class="layoutframeworkPreview '. ($html_id!=''?''.$html_id.' ':'') .'">
			<div class="fake_spine"><header class="spine-header"><a href="" id="wsu-signature">Washington State University</a></header></div>
			<div class="fake_page">
				<div class="product-view product_info">
					<div id="product_addtocart_form" class="product-essential ">
						<div class="product-media media-block product_info_media">
							<div class="product-image">
								<img id="image" src="/skin/adminhtml/default/default/wsu/images/product_image.png" alt="Tori Tank" title="Tori Tank" >
							</div>
							<div class="more-views">
								<h2>More Views</h2>
								<ul class="more-views-imgs">
									<li>
										<a href="#"><img src="/skin/adminhtml/default/default/wsu/images/product_image.png" width="16.5" height="16.5"  ></a>
									</li>
									<li>
										<a href="#"><img src="/skin/adminhtml/default/default/wsu/images/product_image.png" width="16.5" height="16.5"  ></a>
									</li>
									<li>
										<a href="#"><img src="/skin/adminhtml/default/default/wsu/images/product_image.png" width="16.5" height="16.5"  ></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="product-content">
							<div class="no-display"> 
								<input type="hidden" name="product">
								<input type="hidden" name="related_product" id="related-products-field" >
							</div>
							<div class="product-name">
								<h1>Tori Tank</h1>
							</div>
							<div class="email-friend email_area">
								<a href="#"  >Email to a Friend</a>
							</div>
							<div id="review_area" class="review_area">
								<p class="no-rating"><a href="#"  >Be the first to review this product</a></p>
							</div>
							<div id="product_type_data_area" class="product_type_data_area"> </div>
							<div id="tier_price_area" class="tier_price_area"> </div>
							<div class="short_description_area short-description ">
								<h2>Quick Overview</h2>
								<div class="std">A simple ribbed cotton tank. Great for layering.</div>
							</div>
							<div class="description_area description ">
								<h2>Full Overview</h2>
								<div class="std">Ribbed scoop neck tank. 100% cotton.Machine wash.</div>
							</div>
							<div id="other_area" class="other_area">
								<div class="product-options" id="product-options-wrapper">
									<dl class="last"> 
										<dt class="swatch-attr"> <label id="color_label" class="required"> <em>*</em>Color: <span id="select_label_color" class="select-label"></span> </label> </dt>
										<dd class="clearfix swatch-attr">
											<div class="input-box"> <select name="super_attribute[92]" id="attribute92" class="required-entry super-attribute-select no-display swatch-select">  <option >Choose an Option...</option><option value="26" price="0" data-label="indigo">Indigo</option></select>
												<ul id="configurable_swatch_color" class="configurable-swatch-list clearfix">
													<li class="option-indigo is-media" id="option26">
														<a href="#" name="indigo" id="swatch26" class="swatch-link swatch-link-92 has-image" title="Indigo" style="height: 23px; width: 23px;"> <span class="swatch-label" style="height: 21px; width: 21px; line-height: 21px;"> <img src="http://store.wsu.dev/media/catalog/swatches/1/21x21/media/indigo.png" alt="Indigo" width="21" height="21" > </span>												<span class="x">X</span> </a>
													</li>
												</ul>
											</div>
										</dd> 
										<dt class="swatch-attr"> <label id="size_label" class="required"> <em>*</em>Size: <span id="select_label_size" class="select-label"></span> </label> </dt>
										<dd class="clearfix swatch-attr last">
											<div class="input-box"> <select name="super_attribute[180]" id="attribute180" class="required-entry super-attribute-select no-display swatch-select">  <option >Choose an Option...</option><option value="79" price="0" >M</option><option value="78" price="0" data-label="l">L</option><option value="77" price="0" data-label="xl">XL</option></select>
												<ul id="configurable_swatch_size" class="configurable-swatch-list clearfix">
													<li class="option-m" id="option79">
														<a href="#" name="m" id="swatch79" class="swatch-link swatch-link-180" title="M" style="height: 23px; min-width: 23px;"> <span class="swatch-label" style="height: 21px; min-width: 21px; line-height: 21px;"> M </span> <span class="x">X</span> </a>
													</li>
													<li class="option-l" id="option78">
														<a href="#" name="l" id="swatch78" class="swatch-link swatch-link-180" title="L" style="height: 23px; min-width: 23px;"> <span class="swatch-label" style="height: 21px; min-width: 21px; line-height: 21px;"> L </span> <span class="x">X</span> </a>
													</li>
													<li class="option-xl" id="option77">
														<a href="#" name="xl" id="swatch77" class="swatch-link swatch-link-180" title="XL" style="height: 23px; min-width: 23px;"> <span class="swatch-label" style="height: 21px; min-width: 21px; line-height: 21px;"> XL </span> <span class="x">X</span> </a>
													</li>
												</ul>
											</div>
										</dd>
									</dl>
									<p class="required">* Required Fields</p>
								</div>
								<div class="product-options-bottom">
									<div class="price-box"> <span class="regular-price" id="product-price-418_clone"> <span class="price">$60.00</span> </span>
									</div>
									<div class="add-to-cart"> <label for="qty">Qty:</label> <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty"> <button type="button" title="Add to Cart" id="product-addtocart-button" class="button btn-cart " 
											><span><span>Add to Cart</span></span></button> </div>
									<ul class="add-to-links">
										<li><a href="#"  class="link-wishlist " >Add to Wishlist</a></li>
										<li><span class="separator">|</span> <a href="#" class="link-compare " >Add to Compare</a></li>
									</ul>
									<ul class="sharing-links">
										<li><a href="#" class="link-email-friend " title="Email to a Friend" >Email to a Friend</a></li>
										<li> <a href="#"
												target="_blank" title="Share on Facebook" class="link-facebook " > Share Facebook </a> </li>
										<li> <a href="#" target="_blank" title="Share on Twitter" class="link-twitter " >Share on Twitter</a> </li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<div class="product-collateral"> </div>
			</div>
			</div>
		</div>
		<script type="text/javascript">
			
			(function($){

				var _layout = {};
				var settings_default = {
					"parent":{
						"show":"true",
						"type": "flex-row",
						"media-query-type": "column-at-480",
						"size": "thirds-3",
						"media-query-size": "",
						"justification":"justify-start",
						"content_alignment":"content-start"
					},
					"child":{
						"show":"true",
						"size": "thirds-3",
						"order": "order-1",
						"media-query-size": "",
						"item_alignment":"items-start"
					}
					
				};
		
				function cleanTarget(target,callback){
					var clearOf = ["grid-", "flex-", "order-", "full-width-", "thirds-", "fours-", "fifths-", "sixths-", "eigths-", "ninths-", "tenths-", "twelfths-", "wrap", "space-", "center", "column-", "row-"];
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
						var target = root_obj.find("." + idx);
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
												"add_to_box": {
													"settings":{
														"type": "flex-column",
														"order": "order-6"
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
												"container1_area": {
													"settings":{
														"order": "order-2"
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
					$("#row_' . $html_id . ' td.label").html( _createInputForm(_layout,"") );
					
					$("#product_view_options b").siblings("span").hide();
					$("#product_view_options b").siblings("dl").hide();
					$("#product_view_options b").siblings("ul").hide();
					$("#product_view_options b").off().on("click",function(){
						$(this).siblings("dl:not(.parent)").toggle();
						$(this).siblings("ul").toggle();
						$(this).siblings("span").toggle();
						$(this).toggleClass("open","close");
					});
					
					$("#product_view_options .parent_option").off().on("click",function(){
						$(this).siblings(".parent").toggle();
						$(this).toggleClass("open","close");
					});
					
					
					
					_layoutItOut(_root,_layout);
					$("#product_view_options :input").on("change",function(){_updateLayout(_layout)});
				});
			}(jQuery));
		</script>
		';
        return $html;
    }
}
