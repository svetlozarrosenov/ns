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

    doAjax($(this));
}); 

function doAjax($anchor){
	if(ajaxIsRunning){
		return;
	}

    return $.ajax({
        url: $anchor.attr('href'),
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