 var timeout = null;
  $(document).ready(function(){
	$('.wrapper.markdown-body img').wrap('<div class="img_zoom">');
    $('.img_zoom').hover(function() {
		var target = $(this);

		$(document).on('mousemove', function() {
			clearTimeout(timeout);
			timeout = setTimeout(function() {
				if( (!target.is('.closed') || !target.is('.transition')) && target.is(':hover') ){
					target.addClass('transition');
				}
			}, 50);
		});		
		
    }, function() {
		clearTimeout(timeout);
        $(this).removeClass('transition');
		$(this).removeClass('closed');
    });
	$('.img_zoom,.img_zoom:before').on('click',function(){

	});
	$('.img_zoom').on('click',function(){
		if( !$(this).is('.closed') && !$(this).is('.transition') ){
			$(this).addClass('transition');
			$(this).removeClass('closed');
		}else{
			if( !$(this).is('.transition') ){
				$(this).addClass('transition');
				$(this).removeClass('closed');
			}else{
				$(this).removeClass('transition');
				$(this).addClass('closed');
			}
		}
	});
	
  });