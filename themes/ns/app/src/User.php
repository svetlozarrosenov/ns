<?php
namespace App;

class User {
	private $meta_key = '_crb_visits';
	private $user_id;
	private $user_ip;
	private $page_visited;
	private $user_agent;
	private $current_date;

	public function __construct( $visitedPage ) {
		$this->user_id = get_current_user_id();
		$this->user_ip = $_SERVER['REMOTE_ADDR'];
		$this->page_visited = $visitedPage;
		$this->user_agent = $_SERVER['HTTP_USER_AGENT'];
		$this->current_date = date('Y-m-d');
	}

	public function saveVisit() {
		global $wpdb;

		$query = "UPDATE {$wpdb->prefix}usermeta set meta_value = CONCAT(meta_value, '_crb_visits') where user_id = 1 and meta_key='_crb_visits'";

		$results = $wpdb->query( $query, ARRAY_A );

		return $results;
	}
}