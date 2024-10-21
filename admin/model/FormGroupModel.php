<?php 
class FormGroupModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	public function selectOne($id){
		$query = "SELECT *
		FROM form_group
		WHERE id = :id";
		$param = array(
			'id' => $id
		);
		return $this->db->selectOne($query, $param);
	}

	public function selectByCode($code){
		$query = "SELECT *
		FROM form_group
		WHERE code = :code";
		$param = array(
			'code' => $code
		);
		return $this->db->selectOne($query, $param);
	}

	public function selectAll(){
		$query = "SELECT * FROM form_group";
		return $this->db->selectList($query);
	}

	public function selectList($search){
		$start = $search['limit'] * ($search['page']-1);
		$limit = $search['limit'];
		$query = "SELECT *
		FROM form_group
		WHERE (:code = '' OR code = :code)
		AND (:name = '' OR name = :name) 
		ORDER BY id DESC
		LIMIT $start, $limit";
		$param = array(
			'code' => $search['code'],
			'name' => $search['name']
		);
		return $this->db->selectList($query, $param);
	}

	public function selectCount($search){
		$query = "SELECT id
		FROM form_group
		WHERE (:code = '' OR code = :code)
		AND (:name = '' OR name = :name) ";
		$param = array(
			'code' => $search['code'],
			'name' => $search['name']
		);
		return $this->db->selectCount($query, $param);
	}

	public function update($formGroupDTO){
		$query = "UPDATE form_group
		SET name = :name
			, description = :description
			, updated_date = NOW()
		WHERE id = :id";
		$param = array(
			'name' => $formGroupDTO['name'],
			'description' => $formGroupDTO['description'],
			'id' => $formGroupDTO['id']
		);
		$this->db->update($query, $param);
	}

	public function insert($formGroupDTO){
		$query = "INSERT INTO form_group (code, name, description, created_date, updated_date)
		VALUES (:code, :name, :description, NOW(), NOW())";
		
		$param = array(
			'code' => $formGroupDTO['code'],
			'name' => $formGroupDTO['name'],
			'description' => $formGroupDTO['description']
		);
		return $this->db->insert($query, $param);
	}
}