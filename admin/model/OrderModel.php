<?php 
class OrderModel {

	function __construct(){
		$this->db = new MySQLUtils();
	}

	public function selectList($search){
		$start = $search['limit'] * ($search['page']-1);
		$limit = $search['limit'];
		$query = "
		SELECT o.*
		, u.username AS username, u.full_name AS user_full_name, u.phone AS user_phone
		, pi.name AS pack_name 
		, s.name AS status_name
		FROM `order` o
		INNER JOIN user u ON o.id_user = u.id
		INNER JOIN pack_info pi ON o.id_pack_info = pi.id
		INNER JOIN status s ON o.id_status = s.id
		WHERE (:idPack = 0 OR pi.id = :idPack)
		AND (:phone = '' OR u.phone = :phone)
		AND (:idStatus = '' OR o.id_status = :idStatus) 
		ORDER BY o.id DESC
		LIMIT $start, $limit";
		$param = array(
			'idPack' => $search['idPack'],
			'phone' => $search['phone'],
			'idStatus' => $search['idStatus']
		);
		return $this->db->selectList($query, $param);
	}

	public function selectCount($search){
		$query = "
		SELECT o.id
		FROM `order` o
		INNER JOIN user u ON o.id_user = u.id
		INNER JOIN pack_info pi ON o.id_pack_info = pi.id
		INNER JOIN status s ON o.id_status = s.id
		WHERE (:idPack = '' OR pi.id = :idPack)
		AND (:phone = '' OR u.phone = :phone)
		AND (:idStatus = '' OR o.id_status = :idStatus) ";
		$param = array(
			'idPack' => $search['idPack'],
			'phone' => $search['phone'],
			'idStatus' => $search['idStatus']
		);
		return $this->db->selectCount($query, $param);
	}

	public function selectByCode($code){
		$query = "SELECT * FROM `order` WHERE code = :code";
		$param = array(
			"code" => $code
		);
		return $this->db->selectOne($query, $param);
	}

	public function updateStatus($orderDTO){
		$query = "UPDATE `order` 
		SET id_status = :idStatus
		WHERE code = :code ";
		$param = array(
			'code' => $orderDTO['code'],
			'idStatus' => $orderDTO['idStatus']
		);
		return $this->db->update($query, $param);
	}
}