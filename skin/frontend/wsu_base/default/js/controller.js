(function($){
	"use strict";
	$.currencyFormat = function(n) {
		var opts = {};
		opts.style = "currency";
		opts.currency = "USD";
		opts.minimumFractionDigits= 2;
	 
		if(window.Intl) {
			var formatter = new window.Intl.NumberFormat(navigator.language,opts);
			return formatter.format(n);
		} else {
			return "$"+parseFloat(n).toFixed(2);   
		}
	}
	//$( document ).tooltip();
	$.popup_message = function(html_message,clean,callback) {
		if(typeof(clean)==="undefined"){
			clean=false;
		}
		if($("#mess").length<=0){
			$('body').append('<div id="mess">');
		}
		$("#mess").html( (typeof html_message === 'string' || html_message instanceof String) ? html_message : html_message.html() );
		$( "#mess" ).dialog({
			autoOpen: true,
			resizable: false,
			width: 350,
			minHeight: 25,
			modal: true,
			draggable : false,
			create:function(){
				if(clean){
					$('.ui-dialog-titlebar').remove();
					$(".ui-dialog-buttonpane").remove();
				}
				$('body').css({overflow:"hidden"});
				((callback&&callback.create)||null)?callback.create():null;
			},
			buttons:{
				Ok:function(){
					$( this ).dialog( "close" );
					((callback&&callback.ok)||null)?callback.ok():null;
				}
			},
			close: function() {
				$('body').css({overflow:"auto"});
				$( "#mess" ).dialog( "destroy" );
				$( "#mess" ).remove();
				((callback&&callback.close)||null)?callback.close():null;
			}
		});
	}
	$(function(){
		
		$('.remove-cart-item').off().on('click',function(e){
			e.preventDefault();
			e.stopPropagation();
			var btn=$(this);
			var table=btn.closest('table');
			$.popup_message(
			"Are you sure you want to remove this item? <div id='confirm_btns'><a href='#' id='yes_remove' class='spine-button'>Yes</a><a href='#' id='no_remove'  class='spine-button'>No</a></div>",
			true,
			{
				create:function(){
					$('#yes_remove').off().on('click',function(e){
						e.preventDefault();
						e.stopPropagation();
						var url = btn.data('remove_item_url');
						$( "#mess" ).dialog( "close" );
						$.popup_message("<h4><i class='fa fa-spinner fa-spin'></i> Processing</h4>",true);
						$.get(url, function(){
							$( "#mess" ).dialog( "close" );
							btn.closest('tr').fadeOut(500,function(){
								$(this).remove();
								if(table.find('tbody tr').length<=0){
									table.find('tbody').append('<tr><td colspan="'+table.find('thead th').length+'" style="text-align:center">No Items in your cart currently</td></tr>');
								}
							});
						});
					});
					$('#no_remove').off().on('click',function(e){
						e.preventDefault();
						e.stopPropagation();
						$( "#mess" ).dialog( "close" );
					});
				}
			}
			);

		});
		
		/* remeber me block js */
		$(document).ready(function(){
			
			$('.remember-me-box a, .remember-me-popup a').off().on('click', function(e){
				e.preventDefault();
				e.stopPropagation();
				var parentForm = $(this).closest('form');
				var popup = parentForm.find('.remember-me-popup');
				if(popup.is(':visible')){
					popup.hide();
				}else{
					popup.show();
				}
			});
		});
				
		
		
		/*
		var formatter = new Intl.NumberFormat('en-US', {
		  style: 'currency',
		  currency: 'USD',
		  minimumFractionDigits: 2,
		});
		*/
    // ==============================================
    // UI Pattern - Slideshow
    // ==============================================
/*
    	$('.slideshow-container .slideshow')
        .cycle({
            slides: '> li',
            pager: '.slideshow-pager',
            pagerTemplate: '<span class="pager-box"></span>',
            speed: 600,
            pauseOnHover: true,
            swipe: true,
            prev: '.slideshow-prev',
            next: '.slideshow-next',
            fx: 'scrollHorz'
        });
		
		
		$.each($( '.cycle-slideshow' ),function(){
			var slideshow = $(this);
			var progress = slideshow.next('.progress');
			slideshow.on( 'cycle-initialized cycle-before', function( e, opts ) {
				progress.stop(true).css( 'width', 0 );
			});
			
			slideshow.on( 'cycle-initialized cycle-after', function( e, opts ) {
				if ( ! slideshow.is('.cycle-paused') )
					progress.animate({ width: '100%' }, opts.timeout, 'linear' );
			});
			
			slideshow.on( 'cycle-paused', function( e, opts ) {
			   progress.stop(); 
			});
			slideshow.on( 'cycle-resumed', function( e, opts, timeoutRemaining ) {
				progress.animate({ width: '100%' }, timeoutRemaining, 'linear' );
			});
		});
		*/
//		$('.button.btn-cart').on('click',function(e){
//			//from app\design\frontend\wsu_base\default\template\catalog\product\view.phtml
//			var productAddToCartForm = new VarienForm('product_addtocart_form');
//			productAddToCartForm.submit = function(button, url) {
//				if (this.validator.validate()) {
//					var form = this.form;
//					var oldUrl = form.action;
//			
//					if (url) {
//					   form.action = url;
//					}
//					var e = null;
//					try {
//						this.form.submit();
//					} catch (e) {
//					}
//					this.form.action = oldUrl;
//					if (e) {
//						throw e;
//					}
//			
//					if (button && button != 'undefined') {
//						button.disabled = true;
//					}
//				}
//			}.bind(productAddToCartForm);
//			
//			productAddToCartForm.submitLight = function(button, url){
//				if(this.validator) {
//					var nv = Validation.methods;
//					delete Validation.methods['required-entry'];
//					delete Validation.methods['validate-one-required'];
//					delete Validation.methods['validate-one-required-by-name'];
//					// Remove custom datetime validators
//					for (var methodName in Validation.methods) {
//						if (methodName.match(/^validate-datetime-.*/i)) {
//							delete Validation.methods[methodName];
//						}
//					}
//					if (this.validator.validate()) {
//						if (url) {
//							this.form.action = url;
//						}
//						this.form.submit();
//					}
//					Object.extend(Validation.methods, nv);
//				}
//			}.bind(productAddToCartForm);
//			//from app\design\frontend\wsu_base\default\template\catalog\product\view\addtocart.phtml
//			productAddToCartForm.submit(this);
//		});	
//
//
//
//		$('.button.btn-addtag').on('click',function(e){
//			//from app\design\frontend\wsu_base\default\template\catalog\tag\list.phtml
//			var addTagFormJs = new VarienForm('addTagForm');
//			function submitTagForm(){
//				if(addTagFormJs.validator.validate()) {
//					addTagFormJs.form.submit();
//				}
//			}
//			submitTagForm();
//		});	
//
//		if($('.product-tabs').length){
//			protoTabs();
//		}
//

			$('.more-views a').lightbox({
				gallery: {
					enabled: true,
					loop: true,
					
				},
				dialog:{
					resizeToBestPossibleSize: true,
					draggable: false,
					resizable: false,
					modal: true,
					onCreate:function(){
						$('.ui-dialog-titlebar').remove();
						//$(".ui-dialog-buttonpane").remove();
						$('body').css({overflow:"hidden"});
					},
					onOpen:function(jObj){
						jObj.prepend('<span class="tabedBox infoClose">X</span>');
						jObj.find('.infoClose').off().on("click",function(e){
							//WSU_MAP.util.nullout_event(e);
							jObj.dialog( "close" );
						});
					},
					onClose: function(){//jObj) {
						//WSU_MAP.util.close_dialog_modle(obj);
						//jObj.remove();
						$('body').css({overflow:"auto"});
					}
				},
			});
			
			
			
			var orgin_href = $('.top-link-compare').data('orgin_href');
			var href = $('.top-link-compare').attr('href');
			if(orgin_href === "undefined"){
				
				$('.top-link-compare').data('orgin_href',href);
			}

			if($("#hideme_compare").length<=0){
				$('body').append('<div style="display:none;"><div id="hideme_compare"></div></div>');
			}
			$('.top-link-compare').attr('href','#hideme_compare');
			$("#hideme_compare").load( "/catalog/product_compare/index/ #product_comparison", function(){
				$('.top-link-compare').lightbox({
					dialog:{
						resizeToBestPossibleSize: true,
						autoOpen: true,
						draggable: false,
						resizable: false,
						modal: true,
						onCreate:function(){
							$('.ui-dialog-titlebar').remove();
							//$(".ui-dialog-buttonpane").remove();
							$('body').css({overflow:"hidden"});
						},
						onOpen:function(jObj){
							jObj.prepend('<span class="tabedBox infoClose">X</span>');
							jObj.find('.infoClose').off().on("click",function(e){
								//WSU_MAP.util.nullout_event(e);
								jObj.dialog( "close" );
							});
						},
						onClose: function(){//jObj) {
							//WSU_MAP.util.close_dialog_modle(obj);
							//jObj.remove();
							$('body').css({overflow:"auto"});
						}
					},
				});
			});
			
			
	});
})(jQuery);


////replace this asap using jquery
//function protoTabs(){
//	//from app\design\frontend\wsu_base\default\template\catalog\product\view\TABS.phtml
//	Varien.Tabs = Class.create();
//	Varien.Tabs.prototype = {
//	  initialize: function(selector) {
//		var self=this;
//		$$(selector+' a').each(this.initTab.bind(this));
//	  },
//	  initTab: function(el) {
//		  el.href = 'javascript:void(0)';
//		  if ($(el.parentNode).hasClassName('active')) {
//			this.showContent(el);
//		  }
//		  el.observe('click', this.showContent.bind(this, el));
//	  },
//	  showContent: function(a) {
//		var li = $(a.parentNode), ul = $(li.parentNode);
//		ul.select('li', 'ol').each(function(el){
//		  var contents = $(el.id+'_contents');
//		  if (el==li) {
//			el.addClassName('active');
//			contents.show();
//		  } else {
//			el.removeClassName('active');
//			contents.hide();
//		  }
//		});
//	  }
//	}
//	new Varien.Tabs('.product-tabs');
//}
//




