<?php 

class PostModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	public function selectByKey($key){
		$query = "SELECT * FROM post 
		WHERE `key` = :key
		AND id_status = 18";
		$param = array("key" => $key);
		return $this->db->selectList($query, $param);
	}
}