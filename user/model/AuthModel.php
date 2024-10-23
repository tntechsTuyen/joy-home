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

	public function selectUserReceive($idChannel, $idUser){
		$query = "SELECT id_user FROM channel_user 
		WHERE id_channel = :idChannel
		AND id_user != :idUser";
		$param = array(
			'idChannel' => $idChannel,
			'idUser' => $idUser
		);
		return $this->db->selectList($query, $param);
	}

	public function createAccount($userDTO){

		$query = "INSERT INTO user (uuid, username, password, full_name, email, phone, address, birth, gender, avatar_url, id_role, id_status, created_date, updated_date)
		VALUES (:uuid, :username, :password, :fullName, :email, :phone, :address, :birth, :gender, :avatarUrl, :idRole, :idStatus, NOW(), NOW())";
		
		$param = array(
			'uuid' => $userDTO['uuid'],
			'username' => $userDTO['username'],
			'password' => $userDTO['password'],
			'fullName' => $userDTO['fullName'],
			'email' => $userDTO['email'],
			'phone' => $userDTO['phone'],
			'address' => $userDTO['address'],
			'birth' => $userDTO['birth'],
			'gender' => ($userDTO['gender'] == "1"),
			'avatarUrl' => '',
			'idRole' => $userDTO['idRole'],
			'idStatus' => 1
		);
		return $this->db->insert($query, $param);
	}
}