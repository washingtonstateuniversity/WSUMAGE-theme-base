
	var timeout = null;
	$(document).on('mousemove', function() {
		 setOnMove($('.img_zoom:hover'));
	});
	function setOnMove(target){
		clearTimeout(window.timeout);
		window.timeout = setTimeout(function() {

			if( (!target.is('.closed') || !target.is('.transition')) ){
				clearTimeout(window.timeout);
				target.addClass('transition');
			}
		}, 100);
	}

$(document).ready(function(){
	// simple auto anchoring setup
	$.each($('h1,h2,h3,h4,h5,h6'),function(){
		var element = $(this);
		element.css({position:"relative"});
		element.addClass("anchorlink");
		if(element.attr("id") === "undefined"){
			element.attr("id",function(){
				return element.text().split(' ').join('-').split('--').join('-').toLowerCase();
			});
		}
		var target = $("#"+element.attr("id"));
		element.on("click", function(){
			window.location = window.location.href.split('#')[0] +"#"+element.attr("id");
		});
	});
	$('.wrapper.markdown-body img').wrap('<div class="img_zoom">');
	$('.wrapper.markdown-body .img_zoom').wrap('<div class="img_zoom_holder">');
	$(window).resize(function(){
		$.each($('.img_zoom_holder'),function(){
			$(this).css( 'height', $(this).find('img').height() );
		});
	}).trigger('resize');

	$('.img_zoom').hover(function() {
		//var target = $(this);	
		//setOnMove(target);	
	}, function() {
		clearTimeout(window.timeout);
		$(this).removeClass('transition');
		$(this).removeClass('closed');
	});
	$('.img_zoom').on('click',function(){
		if( $(this).is('.closed') ){
			$(this).addClass('transition');
			$(this).removeClass('closed');
		}else{
			$(this).removeClass('transition');
			$(this).addClass('closed');
		}
	});
});