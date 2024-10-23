<?php

class ConfigModel {
	function __construct(){
		$this->db = new MySQLUtils();
	}

	public function selectOneByKey($key){
		$query = "SELECT * FROM config WHERE key = :key";
		$param = array(
			'key' => $key
		);
		return $this->db->selectOne($query, $param);
	}
}