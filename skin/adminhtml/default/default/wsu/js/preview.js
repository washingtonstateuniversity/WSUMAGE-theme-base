(function($){
	"use strict";
	$.wsu = $.wsu || {};
	$.wsu.editor_preview = function(){
		var EP = this;
		EP.type = null;
		EP.html_id = null;
		EP.iframe = null;
		EP.settings_default = {
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
	
		EP.cleanTarget =  function( target, callback){
			//console.log("** cleaning target **");
			var clearOf = ["grid-", "justify-", "flex-", "order-", "full-width-",
						   "thirds-", "fours-", "fifths-", "sixths-", "eigths-",
						   "ninths-", "tenths-", "twelfths-", "wrap", "space-",
						   "center", "column-", "row-", "hide-below-"];
						   
			$.each(clearOf,function(i,val){
				target.stripClass(val,false);
			});
			callback();
			
			/*$.when.apply($, $.map(clearOf, function(idx,val) {
				target.stripClass(val,false);
			})).done(function() {
				callback();
			});*/
		};
		
		EP._layoutItOut = function(root_obj,_data){
			var iFrame = EP.iframe.contents();
			$.each(_data,function(idx,val){
				var target = EP.iframe.contents().find("." + idx);
				if( target.length ){
					target.addClass("preview_sortable");
					EP.cleanTarget( target, function(){
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
	
					});
				}
				if("undefined" !== typeof val.children){
					EP._layoutItOut(root_obj,val.children);
				}
			});
			
			$("#"+EP.type+"_options li").off( "mouseenter mouseleave" );
			$("#"+EP.type+"_options li").hover(function(){
				var _class = $(this).data("block");
				iFrame.find("."+_class).addClass("preview_hovering");
			}, function(){
				iFrame.find(".preview_hovering").removeClass("preview_hovering");
			});
		};
		
		EP.set = function (path, value) {
			var schema = EP._layout[EP.type];  // a moving reference to internal objects within obj
			var pList = path.split(".");
			var len = pList.length;
			for(var i = 0; i < len-1; i++) {
				var elem = pList[i];
				if( !schema[elem] ){
					schema[elem] = {};
				}
				schema = schema[elem];
			}
		
			schema[pList[len-1]] = value;
		};
		
		
		EP._updateLayout = function (){//_data){
			$("#"+EP.type+"_options li").each(function(){//idx,val){
				$(this).children("dl").find("dd").each(function(){//subidx,val){
					var path = $(this).data("path");
					var value = $(this).find(":input").val();
					EP.set(path,value);
				});
			});
			EP._layoutItOut( $("." + EP.html_id), EP._layout[EP.type] );
			$("#"+ EP.html_id).val( JSON.stringify( EP._layout[EP.type] ) );					
		};
		
		
		EP._createInputForm = function( _data, path ){
			
			//console.log( "-------- defaults " );
			//	console.log( settings_default.child );
			//	console.log( settings_default.parent );
			//console.log( "-------- defaults " );
			
			path = path || "";
			var html = "<ul id='"+EP.type+"_options' class='editor_option_list'>";
			//console.log( _data );
			var _settings = {};
			$.each(_data,function(idx,val){
				_settings = {};
				html += "<li data-block='"+idx+"'><b>"+idx+"</b>";
					if( "undefined" !== typeof val.settings ){
							var parent = "";
							if( "product_info" !== idx  && "productview" !== idx && "productlist" !== idx && "undefined" !== typeof val.children){
								html += "<span class='parent_option'>Options</span>";
								parent = "parent";
							}
							html += "<dl class='"+parent+"'>";
							
							//console.log( "---->> before " );
							//console.log( val.settings );
							if( "product_info" !== idx && "productview" !== idx && "productlist" !== idx ){
								var child = EP.settings_default.child;
								_settings = $.extend({},child,val.settings);
								if( "undefined" !== typeof val.children ){
									var _parent = EP.settings_default.parent;
									_settings = $.extend({},_parent,_settings);
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
								$(".type_" + setting_idx).find("[value='" + setting + "']").attr("selected",true);
								
								var input = $(".type_"+setting_idx).html();
								html += "<dd data-classes='" + setting_idx + "' data-path='" + currentpath + "'>" + input + "</dd>";
							});
							html += "</dl>";
					}
					if( "undefined" !== typeof val.children ){
						var passingpath = (path !== "" ? path+"." : "" ) + idx+".children";
						html += EP._createInputForm( val.children, passingpath );
					}
				html += "</li>";
			});
			html += "</ul>"; 
			return html;
		};
		EP.ajaxurl = null;
		
		
		
		EP.setupIframe = function(iframe){
			var ary = EP.html_id.split("_");
			ary.pop();
			var sectionHeadObj = $("#"+ (ary.join("_"))+"-head");
			if(sectionHeadObj.closest(".section-config").is(".active")){
				iframe.off("load").on("load", function(){
					iframe.contents().find("head")
						.append("<meta name='viewport' content='width=device-width, initial-scale=0.5'/>");
						
					EP._layoutItOut( $("." + EP.html_id), EP._layout[EP.type]);
		
					iframe.contents().find("head")
						.append($("<style type='text/css'> .preview_sortable{ border:1px dashed rgba(0, 0, 0, 0); }  .preview_hovering{ border:1px dashed red; } </style>"));
					iframe.siblings(".refresh_iframe").removeClass("loading");
					$("#"+EP.type+"_options :input").on( "change", function(){
						EP._updateLayout( EP._layout[EP.type] );
					});
				});
				iframe.siblings(".refresh_iframe").addClass("loading");
				if( "" === EP.iframe.attr("src") ){
					EP.iframe.attr("src",EP.iframe.data("src"));	
				}
				EP.iframe.removeClass("iframeClose");
			}else{
				iframe.off("load");
				EP.iframe.attr("src","");
				EP.iframe.addClass("iframeClose");
			}
		};
		
		EP.setup = function( html_id ){
			
			EP.html_id = html_id;
			EP.iframe = $("iframe#layoutframeworkPreview_" + EP.html_id);
	
			$(document).ready(function(){
				var _valField = $("#"+ EP.html_id);
				_valField.closest("td").css("width","85%");
				_valField.closest("tr").find("td.label").addClass("editor_options");
				_valField.hide();
	
				if( "" !== _valField.val() ){
					try {
						var str	= _valField.val();
						var obj = JSON.parse(str); // this is how you parse a string into JSON 
						EP._layout[EP.type] = obj;
					} catch (ex) {
						console.error(ex);
					}
				}
				$("#row_"+ EP.html_id + " td.label").html( EP._createInputForm( EP._layout[EP.type], "" ) );
				
				var _opNode = $("#"+EP.type+"_options b");
				
				_opNode.siblings("span").hide();
				_opNode.siblings("dl").hide();
				_opNode.siblings("ul").hide();
				_opNode.off().on("click",function(){
					var _node = $(this);
					_node.siblings("dl:not(.parent)").toggle();
					_node.siblings("ul").toggle();
					_node.siblings("span").toggle();
	
					_node.toggleClass("open","close");
					if( ! _node.is(".open") ){
						_node.siblings(".parent_option").hide();
						_node.siblings(".parent").hide();
					}
				});
	
				$("#"+EP.type+"_options .parent_option").off().on( "click", function(){
					var _node = $(this);
					_node.siblings(".parent").toggle();
					_node.toggleClass("open", "close");
				});
	
				var ary = EP.html_id.split("_");
				ary.pop();
				var sectionHeadObj = $("#"+ (ary.join("_"))+"-head");
				sectionHeadObj.on("click",function(){
					EP.setupIframe( EP.iframe );
				});
				window.setTimeout(function(){
					EP.setupIframe( EP.iframe ); // delaying so mage can catch up with it's ui alterations 
				}, 100);
				
				
				if( null !== EP.ajaxurl ){
					EP.iframe.siblings(".refresh_iframe").on("click",function(){
						var btn = $(this);
						btn.addClass("loading");
						EP.iframe.attr("src","");
						$.getJSON(EP.ajaxurl).always(function(data){
							btn.removeClass("loading");
							EP.iframe.attr("src",data._url);
						});
					});
				}
	
			});
			EP._layout = {
				"productview":{
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
				},
				"productlist":{
					"category-products":{
						"settings":{
							"type":"flex-row"
						},
						"children":{
							"toolbox-top":{
								"settings":{
									"type":"flex-row"
								},
								"children":{
									"sorting_area":{
										"settings":{
											"order":"order-1"
										}
									},
									"filtering_area":{
										"settings":{
											"order":"order-2"
										}
									}
								}
							},
							"toolbox-bottom":{
								"settings":{
									"type":"flex-row"
								},
								"children":{
									"filtering_result_labels":{
										"settings":{
											"order":"order-1"
										}
									},
									"limiter":{
										"settings":{
											"order":"order-2"
										}
									},
									"sorter":{
										"settings":{
											"order":"order-3"
										}
									}
								}
							},
							"category-products-grid":{
						"settings":{
							"type":"flex-row"
						},
						"children":{
							"item":{
								"settings":{
									"type":"flex-column"
								},
								"children":{
									"product-image-wrapper":{
										"settings":{
											"order":"order-1"
										},
									},
									"product-name":{
										"settings":{
											"order":"order-2"
										},
									},
									"rating-area":{
										"settings":{
											"order":"order-3"
										},
									},
									"price-area":{
										"settings":{
											"order":"order-4"
										},
									},
									"actions":{
										"settings":{
											"order":"order-5"
										},
									},
									"add-to-links":{
										"settings":{
											"order":"order-6"
										},
									},
								}
							}
						}
					}
						}
					},
				},
			};
		};
	};
}(jQuery));