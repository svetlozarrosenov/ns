function updateGoogleAnalitycsGtag() {
	let origin = window.location.protocol + '//' + window.location.host;
	let pathname = window.location.href.substr(origin.length);
	console.log(pathname);
	gtag('config', 'UA-162102335-1', {'page_path': pathname}); 
}

export default updateGoogleAnalitycsGtag;