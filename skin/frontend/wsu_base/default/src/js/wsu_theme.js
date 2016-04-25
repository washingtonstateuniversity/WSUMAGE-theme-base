function _defined(n){ return typeof n !== "undefined"; }
function _d(n){
	return _defined(jQuery.wsu_theme) && (jQuery.wsu_theme.state.debug===true) && _defined(window.console) && _defined(window.console.debug) && window.console.debug(n);
}
if (!Array.prototype.indexOf) {
	Array.prototype.indexOf = function(obj, start) {
		 for (var i = (start || 0), j = this.length; i < j; i++) {
			 if (this[i] === obj) { return i; }
		 }
		 return -1;
	};
}
/* seed it */
(function( $, window, WSU_THEME ) {
	$.extend( WSU_THEME||(WSU_THEME={}), {
		is_frontend:true,
		ini:function (options){
			$.extend(WSU_THEME.state,options);
			WSU_THEME.ready();
		},
		ready:function (options){
			$(document).ready(function() {
				var page,location;
				
				WSU_THEME[WSU_THEME.is_frontend?"frontend":"admin"].ini();
				
				location=window.location.pathname;
				page=location.substring(location.lastIndexOf("/") + 1);
				page=page.substring(0,page.lastIndexOf("."));
				if(window._defined(WSU_THEME[page])){
					WSU_THEME[page].ini();
				}
				return options;
			});
		}
	});
})( jQuery, window, jQuery.wsu_theme||(jQuery.wsu_theme={}), _d );