<?php
function nl2p( $string ) {
	$string_parts = explode("\n", $string);
	$string = '<p>' . implode('</p><p>', $string_parts) . '</p>';
	return str_replace("<p></p>", '', $string);
}

function is_blog() {
	$is_blog = false;
	if ( is_front_page() && is_home() ) {
	// Default homepage
	} elseif ( is_front_page()){
	// Static homepage
	} elseif ( is_home()){
	$is_blog = true;
	} else {
	// Everything else
	}
	return $is_blog;
}
