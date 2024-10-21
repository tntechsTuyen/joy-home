<?php 

class OrderModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	public function selectByIdUser($idUser){
		$query = "SELECT o.*
		, s.name AS status_name, pi.code AS pack_code, pi.name As pack_name
		FROM `order` o
		INNER JOIN pack_info pi ON o.id_pack_info = pi.id 
		INNER JOIN status s ON o.id_status = s.id
		WHERE o.id_user = :idUser ";
		$param = array(
			'idUser' => $idUser
		);
		return $this->db->selectList($query, $param);
	}

	public function selectOrderIsExists($idUser, $idPackInfo){
		$query = "SELECT *
		FROM `order` 
		WHERE id_user = :idUser 
		AND id_pack_info = :idPackInfo 
		AND id_status != 17 ";

		$param = array(
			'idUser' => $idUser,
			'idPackInfo' => $idPackInfo
		);
		return $this->db->selectOne($query, $param);
	}

	public function insert($orderDTO){
		$query = "INSERT INTO `order` (code, id_user, id_pack_info, price, id_status, description, created_date, updated_date) 
		VALUES (:code, :idUser, :idPackInfo, :price, :idStatus, :description, NOW(), NOW())";
		$param = array(
			'code' => $orderDTO['code'],
			'idUser' => $orderDTO['idUser'],
			'idPackInfo' => $orderDTO['idPackInfo'],
			'price' => $orderDTO['price'],
			'idStatus' => $orderDTO['idStatus'],
			'description' => $orderDTO['description']
		);
		return $this->db->insert($query, $param);
	}

	public function updateStatus($idPackInfo, $idUser, $status){
		$query = "UPDATE `order` 
		SET id_status = :status 
		WHERE id_user = :idUser 
		AND id_pack_info = :idPackInfo ";
		$param = array(
			'status' => $status, 
			'idUser' => $idUser,
			'idPackInfo' => $idPackInfo
		);
		$this->db->update($query, $param);
	}
}