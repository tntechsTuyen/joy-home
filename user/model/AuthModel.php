<?php 

class AuthModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	public function selectByUsername($username){
		$query = "
		SELECT *
		FROM user
		WHERE username = :username";
		$param = array(
			'username' => $username
		);
		return $this->db->selectOne($query, $param);
	}
}