<?php 

class AuthModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	public function selectByUsername($username){
		$query = "
		SELECT id, uuid, username, password, full_name, email, phone, address, birth, gender, avatar_url, id_status, created_date, updated_date
		FROM user
		WHERE username = :username";
		$param = array(
			'username' => $username
		);
		return $this->db->selectOne($query, $param);
	}
}