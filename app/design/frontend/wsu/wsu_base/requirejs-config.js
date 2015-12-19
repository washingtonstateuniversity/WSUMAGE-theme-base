(function() {
/**
 * WSU something
 */

var config = {
	"paths": {'jquery':'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
		'jquery/ui':'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js',
		'spin':'https://repo.wsu.edu/spine/1/spine.min.js?2015-16-12',
		'datatables':'//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js'},
	map:{'*':{'jquery':'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js',
		'jquery/ui':'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js',
		'spin':'https://repo.wsu.edu/spine/1/spine.min.js?2015-16-12',
		'datatables':'//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js'}}
};

require.config(config);
})();