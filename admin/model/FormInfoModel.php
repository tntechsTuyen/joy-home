<?php 
class FormInfoModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	public function selectOne($id){
		$query = "SELECT *
		FROM form_info
		WHERE id = :id";
		$param = array(
			'id' => $id
		);
		return $this->db->selectOne($query, $param);
	}

	public function selectByCode($code){
		$query = "SELECT *
		FROM form_info
		WHERE code = :code";
		$param = array(
			'code' => $code
		);
		return $this->db->selectOne($query, $param);
	}

	public function selectList($search){
		$start = $search['limit'] * ($search['page']-1);
		$limit = $search['limit'];
		$query = "SELECT fi.*
		, fg.name AS form_group_name
		FROM form_info fi 
		INNER JOIN form_group fg ON fi.id_form_group = fg.id
		WHERE (:code = '' OR fi.code = :code)
		AND (:name = '' OR fi.name = :name) 
		AND (:idFormGroup = '' OR fi.id_form_group = :idFormGroup) 
		ORDER BY id DESC
		LIMIT $start, $limit";
		$param = array(
			'code' => $search['code'],
			'name' => $search['name'],
			'idFormGroup' => $search['idFormGroup']
		);
		return $this->db->selectList($query, $param);
	}

	public function selectCount($search){
		$query = "SELECT id
		FROM form_info fi
		WHERE (:code = '' OR fi.code = :code)
		AND (:name = '' OR fi.name = :name) 
		AND (:idFormGroup = '' OR fi.id_form_group = :idFormGroup) ";
		$param = array(
			'code' => $search['code'],
			'name' => $search['name'],
			'idFormGroup' => $search['idFormGroup']
		);
		return $this->db->selectCount($query, $param);
	}

	public function update($formInfoDTO){
		$query = "UPDATE form_info
		SET id_form_group = :idFormGroup
			, name = :name
			, description = :description
			, html_content = :htmlContent
			, thumb_url = :thumbUrl
			, id_status = :idStatus
			, updated_date = NOW()
		WHERE id = :id";
		$param = array(
			'idFormGroup' => $formInfoDTO['idFormGroup'],
			'name' => $formInfoDTO['name'],
			'description' => $formInfoDTO['description'],
			'htmlContent' => $formInfoDTO['htmlContent'],
			'thumbUrl' => $formInfoDTO['thumbUrl'],
			'idStatus' => $formInfoDTO['idStatus'],
			'id' => $formInfoDTO['id']
		);
		return $this->db->update($query, $param);
	}

	public function insert($formInfoDTO){
		$query = "INSERT INTO form_info (id_form_group, code, name, description, html_content, thumb_url, id_status, created_date, updated_date)
		VALUES (:idFormGroup, :code, :name, :description, :htmlContent, :thumbUrl, :idStatus, NOW(), NOW())";
		
		$param = array(
			'idFormGroup' => $formInfoDTO['idFormGroup'],
			'code' => $formInfoDTO['code'],
			'name' => $formInfoDTO['name'],
			'description' => $formInfoDTO['description'],
			'htmlContent' => $formInfoDTO['htmlContent'],
			'thumbUrl' => $formInfoDTO['thumbUrl'],
			'idStatus' => $formInfoDTO['idStatus'],
		);
		return $this->db->insert($query, $param);
	}
}