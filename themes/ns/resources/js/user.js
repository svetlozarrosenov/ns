function updateUserVisit(location) {
	$.ajax({
        url: crbSiteUtils.ajaxUrl,
        type: 'POST',
        data: {
        	action: 'crb_save_visit',
        	current_page: location
        }
    });
}

export default updateUserVisit;