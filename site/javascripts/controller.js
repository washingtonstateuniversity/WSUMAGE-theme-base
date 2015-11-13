	var timeout = null;
	$(document).on('mousemove', function() {
		 setOnMove($('.img_zoom:hover'));
	});
	function setOnMove(target){
		clearTimeout(window.timeout);
		window.timeout = setTimeout(function() {
			
			if( (!target.is('.closed') || !target.is('.transition')) && target.is(':hover') ){
				clearTimeout(window.timeout);
				target.addClass('transition');
			}
		}, 100);
	}

  $(document).ready(function(){
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
		if( 
			( !$(this).is('.closed') && !$(this).is('.transition') )
			||
			( !$(this).is('.transition') && $(this).closest('.img_zoom_holder').has('.closed') )
		){
			$(this).addClass('transition');
			$(this).removeClass('closed');
		}else{
			$(this).removeClass('transition');
			$(this).addClass('closed');
		}
	});
	
  });