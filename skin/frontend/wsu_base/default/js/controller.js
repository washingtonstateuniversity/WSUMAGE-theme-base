(function($){
	$(function(){
		var slideshow = $( '.cycle-slideshow' );
		var progress = $('#progress');

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
		
		
		
		$('.button.btn-cart').on('click',function(e){
			//from app\design\frontend\wsu_base\default\template\catalog\product\view.phtml
			var productAddToCartForm = new VarienForm('product_addtocart_form');
			productAddToCartForm.submit = function(button, url) {
				if (this.validator.validate()) {
					var form = this.form;
					var oldUrl = form.action;
			
					if (url) {
					   form.action = url;
					}
					var e = null;
					try {
						this.form.submit();
					} catch (e) {
					}
					this.form.action = oldUrl;
					if (e) {
						throw e;
					}
			
					if (button && button != 'undefined') {
						button.disabled = true;
					}
				}
			}.bind(productAddToCartForm);
			
			productAddToCartForm.submitLight = function(button, url){
				if(this.validator) {
					var nv = Validation.methods;
					delete Validation.methods['required-entry'];
					delete Validation.methods['validate-one-required'];
					delete Validation.methods['validate-one-required-by-name'];
					// Remove custom datetime validators
					for (var methodName in Validation.methods) {
						if (methodName.match(/^validate-datetime-.*/i)) {
							delete Validation.methods[methodName];
						}
					}
					if (this.validator.validate()) {
						if (url) {
							this.form.action = url;
						}
						this.form.submit();
					}
					Object.extend(Validation.methods, nv);
				}
			}.bind(productAddToCartForm);
			//from app\design\frontend\wsu_base\default\template\catalog\product\view\addtocart.phtml
			productAddToCartForm.submit(this);
		});	



		$('.button.btn-addtag').on('click',function(e){
			//from app\design\frontend\wsu_base\default\template\catalog\tag\list.phtml
			var addTagFormJs = new VarienForm('addTagForm');
			function submitTagForm(){
				if(addTagFormJs.validator.validate()) {
					addTagFormJs.form.submit();
				}
			}
			submitTagForm();
		});	

		if($('.product-tabs').length){
			protoTabs();
		}



	});
})(jQuery);


//replace this asap using jquery
function protoTabs(){
	//from app\design\frontend\wsu_base\default\template\catalog\product\view\TABS.phtml
	Varien.Tabs = Class.create();
	Varien.Tabs.prototype = {
	  initialize: function(selector) {
		var self=this;
		$$(selector+' a').each(this.initTab.bind(this));
	  },
	  initTab: function(el) {
		  el.href = 'javascript:void(0)';
		  if ($(el.parentNode).hasClassName('active')) {
			this.showContent(el);
		  }
		  el.observe('click', this.showContent.bind(this, el));
	  },
	  showContent: function(a) {
		var li = $(a.parentNode), ul = $(li.parentNode);
		ul.select('li', 'ol').each(function(el){
		  var contents = $(el.id+'_contents');
		  if (el==li) {
			el.addClassName('active');
			contents.show();
		  } else {
			el.removeClassName('active');
			contents.hide();
		  }
		});
	  }
	}
	new Varien.Tabs('.product-tabs');
}





