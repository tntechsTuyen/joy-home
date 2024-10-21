<?php 

class UserPackFormModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	function selectByCode($code){
		$query = "SELECT * FROM user_pack_form WHERE code = :code";
		$param = array(
			"code" => $code
		);
		return $this->db->selectOne($query, $param);
	}

	function selectFormByUser($idUser){
		$query = "SELECT upf.id, upf.code, upf.process, upf.id_status
		, s.name AS status_name, fi.code AS form_code, fi.name AS form_name
		, upf.created_date, upf.updated_date
		FROM user_pack_form upf 
		INNER JOIN form_info fi ON upf.id_form_info = fi.id 
		INNER JOIN status s ON upf.id_status = s.id
		WHERE upf.id_user = :idUser ";
		$param = array(
			'idUser' => $idUser
		);
		return $this->db->selectList($query, $param); 
	}

	function updateProcess($id, $process){
		$query = "UPDATE user_pack_form 
		SET process = :process
		, updated_date = NOW()
		WHERE id = :id";
		$param = array(
			'process' => $process,
			'id' => $id
		);
		$this->db->update($query, $param);
	}
}