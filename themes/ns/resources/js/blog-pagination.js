import updateGoogleAnalitycsGtag from './google-analytics';

var $win = $(window);
var ajaxIsRunning = false;
var $loader = $('.loader');

$.fn.isInViewport = function() {
    let elementTop = $(this).offset().top;
    let elementBottom = elementTop + $(this).outerHeight();

    let viewportTop = $win.scrollTop();
    let viewportBottom = viewportTop + $win.height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

$('.section__actions').on('click', '.js-load-more', function(e) {
    e.preventDefault();
    
    if(ajaxIsRunning){
		return;
	}
    
    let newUrl = $(this).attr('href');

    History.pushState({}, '', newUrl);

    updateGoogleAnalitycsGtag();
}); 

function doAjax(href){
    return $.ajax({
        url: href,
	    beforeSend:()=>{
	    	ajaxIsRunning = true;
	    	$loader.show();
	    },
    }).done((response)=>{
        let $container = $('.articles ol');
        let $pagination = $('#blog-pagination');
        let $newPosts = $(response).find('.articles li');

        $container.append($newPosts);
        $pagination.replaceWith($(response).find('#blog-pagination'));
        $loader.hide();
        ajaxIsRunning = false;
    });
}

$win.bind('popstate', function(){
	if (ajaxIsRunning) {
		return;
	}
	
	let href = window.location.href;

	doAjax(href);
});


function triggerDelegateEvent($parent, $child) {
    var event = jQuery.Event('click');
    event.target = $parent.find($child)[0];

    $parent.trigger(event);
}

function initPagination() {
	$win.on('resize scroll', function() {
	    if ($('#blog-pagination').isInViewport()) {
	        triggerDelegateEvent($('.section__actions'), $('.js-load-more'));
	    }
	});
}


export default initPagination;