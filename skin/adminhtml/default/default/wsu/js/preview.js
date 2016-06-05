(function($){
	"use strict";
	$.wsu = $.wsu || {};
	$.wsu.product_preview = {};
	$.wsu.product_preview.html_id = null;
	$.wsu.product_preview.iframe = null;
	$.wsu.product_preview.settings_default = {
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

	$.wsu.product_preview.cleanTarget =  function( target, callback){
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
	
	$.wsu.product_preview._layoutItOut = function(root_obj,_data){
		var iFrame = $.wsu.product_preview.iframe.contents();
		$.each(_data,function(idx,val){
			var target = $.wsu.product_preview.iframe.contents().find("." + idx);
			if( target.length ){
				target.addClass("preview_sortable");
				$.wsu.product_preview.cleanTarget( target, function(){
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
				$.wsu.product_preview._layoutItOut(root_obj,val.children);
			}
		});
		
		$("#product_view_options li").off( "mouseenter mouseleave" );
		$("#product_view_options li").hover(function(){
			var _class = $(this).data("block");
			iFrame.find(".product-view ."+_class).addClass("preview_hovering");
		}, function(){
			iFrame.find(".preview_hovering").removeClass("preview_hovering");
		});
	};
	
	$.wsu.product_preview.set = function (path, value) {
		var schema = $.wsu.product_preview._layout;  // a moving reference to internal objects within obj
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
	
	
	$.wsu.product_preview._updateLayout = function (){//_data){
		$("#product_view_options li").each(function(){//idx,val){
			$(this).children("dl").find("dd").each(function(){//subidx,val){
				var path = $(this).data("path");
				var value = $(this).find(":input").val();
				$.wsu.product_preview.set(path,value);
			});
		});
		$.wsu.product_preview._layoutItOut( $("." + $.wsu.product_preview.html_id), $.wsu.product_preview._layout );
		$("#"+ $.wsu.product_preview.html_id).val( JSON.stringify( $.wsu.product_preview._layout ) );					
	};
	
	
	$.wsu.product_preview._createInputForm = function( _data, path ){
		
		//console.log( "-------- defaults " );
		//	console.log( settings_default.child );
		//	console.log( settings_default.parent );
		//console.log( "-------- defaults " );
		
		path = path || "";
		var html = "<ul id='product_view_options'>";
		//console.log( _data );
		var _settings = {};
		$.each(_data,function(idx,val){
			_settings = {};
			html += "<li data-block='"+idx+"'><b>"+idx+"</b>";
				if( "undefined" !== typeof val.settings ){
						var parent = "";
						if( "product_info" !== idx && "undefined" !== typeof val.children){
							html += "<span class='parent_option'>Options</span>";
							parent = "parent";
						}
						html += "<dl class='"+parent+"'>";
						
						//console.log( "---->> before " );
						//console.log( val.settings );
						if( "product_info" !== idx ){
							var child = $.wsu.product_preview.settings_default.child;
							_settings = $.extend({},child,val.settings);
							if( "undefined" !== typeof val.children ){
								var _parent = $.wsu.product_preview.settings_default.parent;
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
					html += $.wsu.product_preview._createInputForm( val.children, passingpath );
				}
			html += "</li>";
		});
		html += "</ul>"; 
		return html;
	};
	$.wsu.product_preview.ajaxurl = null;
	
	
	
	$.wsu.product_preview.setupIframe = function(iframe){
		iframe.off().on("load", function(){
			iframe.contents().find("head")
				.append("<meta name='viewport' content='width=device-width, initial-scale=0.5'/>");
				
			$.wsu.product_preview._layoutItOut( $("." + $.wsu.product_preview.html_id), $.wsu.product_preview._layout);

			iframe.contents().find("head")
				.append($("<style type='text/css'> .preview_sortable{ border:1px dashed rgba(0, 0, 0, 0); }  .preview_hovering{ border:1px dashed red; } </style>"));
				
			$("#product_view_options :input").on( "change", function(){ 
				$.wsu.product_preview._updateLayout( $.wsu.product_preview._layout );
			});
		});
	};
	
	$.wsu.product_preview.setup = function( html_id ){
		
		$.wsu.product_preview.html_id = html_id;
		$.wsu.product_preview.iframe = $("iframe#layoutframeworkPreview_" + $.wsu.product_preview.html_id);

		$(document).ready(function(){
			var _valField = $("#"+ html_id);
			_valField.closest("td").css("width","85%");
			_valField.hide();

			if( "" !== _valField.val() ){
				try {
					var str	= _valField.val();
					var obj = JSON.parse(str); // this is how you parse a string into JSON 
					$.wsu.product_preview._layout = obj;
				} catch (ex) {
					console.error(ex);
				}
			}
			$("#row_"+ html_id + " td.label").html( $.wsu.product_preview._createInputForm( $.wsu.product_preview._layout, "" ) );
			
			var _opNode = $("#product_view_options b");
			
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

			$("#product_view_options .parent_option").off().on( "click", function(){
				var _node = $(this);
				_node.siblings(".parent").toggle();
				_node.toggleClass("open", "close");
			});

			$.wsu.product_preview.setupIframe( $.wsu.product_preview.iframe );

			if( null !== $.wsu.product_preview.ajaxurl ){
				$(".refresh_iframe").on("click",function(){
					$.getJSON($.wsu.product_preview.ajaxurl).always(function(data){
						console.log(data._url);
						$.wsu.product_preview.iframe.attr("src",data._url);
					});
				});
			}

		});
		$.wsu.product_preview._layout = {
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
	};
}(jQuery));