import pagination from './blog-pagination';
import updateUserVisit from './user';

var ajaxIsRunning = false;
var $win = $(window);

pagination.init();

updateUserVisit(window.location.href);

$win.bind('popstate', function(){
	if (ajaxIsRunning) {
		return;
	}
	
	let href = window.location.href;

	pagination.doAjax(href);
    
    updateUserVisit(href);
});