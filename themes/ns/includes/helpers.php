<?php
function nl2p( $string ) {
	$string_parts = explode("\n", $string);
	$string = '<p>' . implode('</p><p>', $string_parts) . '</p>';
	return str_replace("<p></p>", '', $string);
}

function is_blog () {
    if ( is_front_page() && is_home() ) {
		return false;
	} elseif ( is_front_page() ) {
		return false;
	} elseif ( is_home() ) {
		return true;
	} 
	else {
		return false;
	}
}