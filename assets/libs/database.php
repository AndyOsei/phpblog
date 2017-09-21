<?php
/**
* 
*/
class Database
{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $password = DB_PASSWORD;
	public $db_name = DB_NAME;

	public $link;

	function __construct() {
		$this->connect();
	}

	private function connect() {
		$this->link = new mysqli($this->host, $this->user, $this->password, $this->db_name);

	}

	public function select($query) {

		$result = $this->link->query($query);

		if($result->num_rows > 0) {
			return $result;
		}else {
			return false;
		}
	}

	public function insert($query) {

		$insert = $this->link->query($query);

		if($insert) {
			header('location: index.php');
		}else {
			echo "Post was not inserted";
		}
	}

	public function update($query) {

		$update = $this->link->query($query);

//		if($update) {
//			header('location: index.php?msg = Post Updated..');
//		}else {
//			echo "Post was not updated";
//		}
	}

	public function delete($query) {

		$delete = $this->link->query($query);

		if($delete) {
			header('location: index.php');
		}else {
			echo "Post was not deleted";
		}
	}
	
}