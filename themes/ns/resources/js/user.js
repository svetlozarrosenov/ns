function updateUserVisit() {
	let currentPage = window.location.href;

	$.ajax({
        url: crbSiteUtils.ajaxUrl,
        type: 'POST',
        data: {
        	action: 'crb_save_visit',
        	current_page: currentPage
        }
    }).done((response)=>{
        console.log(response);
    });
}

export default updateUserVisit;