<?php 

class UserPackFormStepModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	public function selectStepByUserPackForm($idUserPackForm){
		$query = "SELECT fc.id AS cate_id, fc.id_parent AS fc_parent, fc.code AS cate_code, fc.name AS cate_name
		, fs.id AS step_id, fs.code AS step_code, fs.name AS step_name, fs.content AS step_content, fs.id_type AS step_type
		, upf.process AS upf_process
		, upfs.id AS upfs_id, upfs.id_status AS upfs_status
		FROM user_pack_form upf
		INNER JOIN form_cate fc ON upf.id_form_info = fc.id_form_info
		LEFT JOIN form_step fs ON fc.code = fs.code AND fc.type = 'file'
		LEFT JOIN user_pack_form_step upfs ON upf.id = upfs.id_user_pack_form AND fs.id = upfs.id_step_info
		WHERE upf.id = :idUserPackForm AND fc.id_parent != 0
		ORDER BY fc.id ASC";
		$param = array(
			'idUserPackForm' => $idUserPackForm
		);
		return $this->db->selectList($query, $param);
	}

	public function selectByUserPackFormAndStep($userPackFormCode, $stepCode){
		$query = "SELECT upfs.*
		FROM user_pack_form upf 
		INNER JOIN user_pack_form_step upfs ON upf.id = upfs.id_user_pack_form 
		INNER JOIN form_step fs ON upfs.id_step_info = fs.id 
		WHERE upf.code = :userPackFormCode 
		AND fs.code = :stepCode ";
		$param = array(
			'userPackFormCode' => $userPackFormCode,
			'stepCode' => $stepCode
		);
		return $this->db->selectOne($query, $param);
	}

	public function selectCountByUserPackFormGroupByStatus($idUserPackForm){
		$query = "SELECT SUM(CASE WHEN id_status IN (12, 13) THEN 1 ELSE 0 END) AS t1
		,  SUM(CASE WHEN id_status = 14 THEN 1 ELSE 0 END) AS t2
		FROM user_pack_form_step
		WHERE id_user_pack_form = :idUserPackForm";

		$param = array(
			'idUserPackForm' => $idUserPackForm
		);

		return $this->db->selectOne($query, $param);
	}

	public function updateStatus($id, $idStatus){
		$query = "UPDATE user_pack_form_step
		SET id_status = :idStatus 
		, updated_date = NOW()
		WHERE id = :id";
		$param = array(
			"idStatus" => $idStatus,
			"id" => $id
		);
		return $this->db->update($query, $param);
	}

}