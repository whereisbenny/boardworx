<?php

define("DB_SERVER", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "boardworx");

class Connection {

	//attributes
	private $mysqli;

	public function __construct() {
		$this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
	}

	//Close connection
	public function close_connection() {
		$this->mysqli->close();
	}

	//execute the passed in query and return result
	public function query($sql) {

		//execute query
		$result = $this->mysqli->query($sql);
		return $result;
	}


	// fetch a row from result_set as an associative array
	public function fetch_array($result_set) {
		return $result_set->fetch_assoc();
	}

	public function get_insert_id(){
		return $this->mysqli->insert_id;
	}
}