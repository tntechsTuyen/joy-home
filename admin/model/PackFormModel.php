<?php 
class PackFormModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	function selectOne($id){
		$query = "SELECT *
		FROM pack_form
		WHERE id = :id";
		$param = array(
			'id' => $id
		);
		return $this->db->selectOne($query, $param);
	}

	function selectIdFormByIdPack($idPackInfo){
		$query = "SELECT id_form_info 
		FROM pack_form 
		WHERE id_pack_info = :idPackInfo";
		$param = array(
			'idPackInfo' => $idPackInfo
		);
		return $this->db->selectListSingle($query, $param);
	}

	function selectByPackAndForm($idPackInfo, $idFormInfo){
		$query = "SELECT *
		FROM pack_form
		WHERE id_pack_info = :idPackInfo 
		AND id_form_info = :idFormInfo ";
		$param = array(
			'idPackInfo' => $idPackInfo,
			'idFormInfo' => $idFormInfo
		);
		return $this->db->selectOne($query, $param);
	}

	function selectFormByIdPack($idPackInfo){
		$query = "SELECT pf.*
		, fi.id AS form_id, fi.code AS form_code, fi.name AS form_name, fi.description AS form_description, fi.thumb_url AS form_thumb_url
		, fg.code AS group_code, fg.name AS group_name
		FROM pack_form pf 
		INNER JOIN form_info fi ON pf.id_form_info = fi.id
		INNER JOIN form_group fg ON fi.id_form_group = fg.id
		WHERE pf.id_pack_info = :idPackInfo
		AND pf.id_status = 3";
		$param = array(
			'idPackInfo' => $idPackInfo
		);
		return $this->db->selectList($query, $param);
	}

	function selectSetupFromByIdPack($idPackInfo){
		$query = "SELECT pf.*
		, fi.id AS form_id, fi.code AS form_code, fi.name AS form_name, fi.description AS form_description, fi.thumb_url AS form_thumb_url
		, fg.code AS group_code, fg.name AS group_name
		FROM pack_form pf 
		RIGHT JOIN form_info fi ON pf.id_form_info = fi.id AND pf.id_pack_info = :idPackInfo AND pf.id_status = 3
		RIGHT JOIN form_group fg ON fi.id_form_group = fg.id ";
		$param = array(
			'idPackInfo' => $idPackInfo
		);
		return $this->db->selectList($query, $param);
	}

	public function activePackForm($idPackInfo, $idForms){
		$strIdForms = implode(", ", $idForms);
		$query = "UPDATE pack_form 
		SET id_status = 3 
		WHERE id_pack_info = :idPackInfo 
		AND id_form_info IN ($strIdForms) ";
		$param = array(
			'idPackInfo' => $idPackInfo
		);
		$this->db->update($query, $param);
	}

	public function unactivePackForm($idPackInfo, $idForms){
		$strIdForms = implode(", ", $idForms);
		$query = "UPDATE pack_form 
		SET id_status = 4 
		WHERE id_pack_info = :idPackInfo 
		AND id_form_info NOT IN ($strIdForms) ";
		$param = array(
			'idPackInfo' => $idPackInfo
		);
		$this->db->update($query, $param);
	}

	public function updateStatus($id, $idStatus){
		$query = "UPDATE pack_form
		SET id_status = :idStatus
			, updated_date = NOW()
		WHERE id = :id";
		$param = array(
			'idStatus' => $idStatus,
			'id' => $id
		);
		$this->db->update($query, $param);
	}

	public function insert($packFormDTO){
		$query = "INSERT INTO pack_form (id_pack_info, id_form_info, id_status, created_date, updated_date)
		VALUES (:idPackInfo, :idFormInfo, :idStatus, NOW(), NOW())";
		
		$param = array(
			'idPackInfo' => $packFormDTO['idPackInfo'],
			'idFormInfo' => $packFormDTO['idFormInfo'],
			'idStatus' => $packFormDTO['idStatus']
		);
		return $this->db->insert($query, $param);
	}
}