function updateUserVisit(location) {
	$.ajax({
        url: crbSiteUtils.ajaxUrl,
        type: 'POST',
        data: {
        	action: 'crb_save_visit',
        	current_page: location
        }
    }).done((response)=>{
        console.log(response);
    });
}

export default updateUserVisit;