<?php 
class UserModel{
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

	public function selectByUUID($uuid){
		$query = "
		SELECT id, uuid, username, password, full_name, email, phone, address, birth, gender, avatar_url, id_status, created_date, updated_date
		FROM user
		WHERE uuid = :uuid";
		$param = array(
			'uuid' => $uuid
		);
		return $this->db->selectOne($query, $param);
	}

	public function selectList($search){
		$start = $search['limit'] * ($search['page']-1);
		$limit = $search['limit'];
		$query = "
		SELECT id, uuid, username, password, full_name, email, phone, address, birth, gender, avatar_url, id_status, created_date, updated_date
		FROM user
		WHERE (:phone = '' OR phone = :phone)
		AND (:username = '' OR username = :username)
		AND (:full_name = '' OR full_name = :full_name) 
		AND (:email = '' OR email = :email) 
		ORDER BY id DESC
		LIMIT $start, $limit";
		$param = array(
			'phone' => $search['phone'],
			'username' => $search['username'],
			'full_name' => $search['full_name'],
			'email' => $search['email']
		);
		return $this->db->selectList($query, $param);
	}

	public function selectCount($search){
		$query = "
		SELECT id, uuid, username, password, full_name, email, phone, address, birth, gender, avatar_url, id_status, created_date, updated_date
		FROM user
		WHERE (:phone = '' OR phone = :phone)
		AND (:username = '' OR username = :username)
		AND (:full_name = '' OR full_name = :full_name) 
		AND (:email = '' OR email = :email) ";
		$param = array(
			'phone' => $search['phone'],
			'username' => $search['username'],
			'full_name' => $search['full_name'],
			'email' => $search['email']
		);
		return $this->db->selectCount($query, $param);
	}

	public function update($userDTO){
		$queryPass = ($userDTO['password'] != "") ? ", password = :password " : "";
		$query = "
		UPDATE user
		SET full_name = :fullName
			, email = :email
			, phone = :phone
			, address = :address
			, birth = :birth
			, gender = :gender
			, avatar_url = :avatarUrl
			, id_role = :idRole
			, id_status = :idStatus
			, updated_date = NOW()
			$queryPass
		WHERE uuid = :uuid";
		$param = array(
			'fullName' => $userDTO['fullName'],
			'email' => $userDTO['email'],
			'phone' => $userDTO['phone'],
			'address' => $userDTO['address'],
			'birth' => $userDTO['birth'],
			'gender' => ($userDTO['gender'] == "1"),
			'avatarUrl' => $userDTO['avatarUrl'],
			'idRole' => $userDTO['idRole'],
			'idStatus' => $userDTO['idStatus'],
			'uuid' => $userDTO['uuid']
		);
		if($userDTO['password'] != ""){
			$param['password'] = $userDTO['password'];
		}
		$this->db->update($query, $param);
	}

	public function insert($userDTO){

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