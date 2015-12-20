var config = {
	"paths":{
		'jquery':'https://code.jquery.com/jquery-1.11.3.min',
		'_jquery':'jquery/',
		'jquery/ui':'https://code.jquery.com/ui/1.11.4/jquery-ui',
		'jquery/jquery-migrate':'https://code.jquery.com/jquery-migrate-1.2.1.min',
		'spine':'https://repo.wsu.edu/spine/1/spine.min.js?2015-16-12',
		'datatables':'//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min'},
	 map: {
		"*": {
			"jquery/jquery.mobile.custom": "/static/frontend/wsu/wsu_base/en_US/jquery/jquery.mobile.custom.js",
			'jquery/jquery.cookie':"/static/frontend/wsu/wsu_base/en_US/jquery/jquery.cookie.js",
			'jquery/jquery.validate':'/static/frontend/wsu/wsu_base/en_US/jquery.validate.js',
			'jquery/jquery.metadata':'/static/frontend/wsu/wsu_base/en_US/jquery/jquery.metadata.js',
			'jquery/jquery-ui-timepicker-addon':'/static/frontend/wsu/wsu_base/en_US/jquery/jquery-ui-timepicker-addon.js'
		}
	},
	"shim": {
        "spine" : ["jquery"]
    },deps: [
		"spine",
		"datatables"
	]
};
