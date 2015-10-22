// JavaScript Document
(function($,window,WSU_THEME) {
	$.extend( WSU_THEME, {
		frontend : {
			defaults:{ },
			ini:function(){
				WSU_THEME.is_frontend = true;
			},
		}
	});
})(jQuery,window,jQuery.wsu_theme||(jQuery.wsu_theme={}));