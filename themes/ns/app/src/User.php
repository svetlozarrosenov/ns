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
		$this->current_date = date('Y-m-d H:i:s');
	}

	public function save_visit() {
		global $wpdb;

		$data = $this->generate_data();

		$query = "UPDATE {$wpdb->prefix}usermeta set meta_value = CONCAT(meta_value, '{$data}') where user_id = {$this->user_id} and meta_key='{$this->meta_key}'";

		$state = $wpdb->query( $query, ARRAY_A );

		return $state;
	}

	private function generate_data() {
		return $this->user_ip . '|' . $this->page_visited . '|' . $this->user_agent . '|' . $this->current_date . '\r\n\r\n';
	}
}