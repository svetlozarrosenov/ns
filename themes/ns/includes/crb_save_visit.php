<?php
add_action( 'wp_ajax_crb_save_visit', 'crb_save_visit' );
add_action( 'wp_ajax_nopriv_crb_save_visit', 'crb_save_visit' );

function crb_save_visit() {
	if ( ! is_user_logged_in() || empty( $_POST['current_page'] ) ) {
		return;
	}

	$user = new App\User( $_POST['current_page'] );

	$saved = $user->saveVisit();

	wp_send_json_success( array(
		'visit' => $saved
	) );
}

function crb_get_columns_from_association( $meta_key, $post_id=false ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}
	global $wpdb;
	$results = $wpdb->get_results( "SELECT p.post_title, p.ID FROM {$wpdb->prefix}postmeta AS pm INNER JOIN {$wpdb->prefix}posts as p on p.ID = pm.post_id WHERE meta_key like '_{$meta_key}|||%|id' AND pm.meta_value = {$post_id} AND p.post_status = 'publish'", ARRAY_A );
	$posts = [];

	foreach ( $results as $result ) {
		$posts[] = [
			'title' => $result['post_title'],
			'id' => $result['ID'],
		];
	}
	
	return $posts;
}