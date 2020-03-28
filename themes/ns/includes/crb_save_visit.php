<?php
add_action( 'wp_ajax_crb_save_visit', 'crb_save_visit' );
add_action( 'wp_ajax_nopriv_crb_save_visit', 'crb_save_visit' );

function crb_save_visit() {
	if ( ! is_user_logged_in() || empty( $_POST['current_page'] ) ) {
		return;
	}

	$user = new App\User( $_POST['current_page'] );

	$saved = $user->save_visit();

	wp_send_json_success( array(
		'state' => $saved
	) );
}

