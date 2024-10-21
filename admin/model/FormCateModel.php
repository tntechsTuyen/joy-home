<?php 
class FormCateModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	function selectOne($id){
		$query = "SELECT *
		FROM form_cate
		WHERE id = :id";
		$param = array(
			'id' => $id
		);
		return $this->db->selectOne($query, $param);
	}

	function selectByCode($code){
		$query = "SELECT *
		FROM form_cate
		WHERE code = :code";
		$param = array(
			'code' => $code
		);
		return $this->db->selectOne($query, $param);
	}

	function selectByIdFormInfo($idFormInfo){
		$query = "SELECT *
		FROM form_cate
		WHERE id_form_info = :idFormInfo";
		$param = array(
			'idFormInfo' => $idFormInfo
		);
		return $this->db->selectList($query, $param);
	}

	function selectByIdParent($idParent){
		$query = "SELECT *
		FROM form_cate
		WHERE id_parent = :idParent";
		$param = array(
			'idParent' => $idParent
		);
		return $this->db->selectList($query, $param);
	}

	public function updateName($code, $name){
		$query = "UPDATE form_cate 
		SET name = :name 
		WHERE code = :code";
		$param = array(
			'code' => $code,
			'name' => $name
		);
		$this->db->update($query, $param);
	}

	public function update($formCateDTO){
		$query = "UPDATE form_cate
		SET id_parent = :idParent
			, name = :name
			, description = :description
			, updated_date = NOW()
		WHERE id = :id";
		$param = array(
			'idParent' => $formCateDTO['idParent'],
			'name' => $formCateDTO['name'],
			'description' => $formCateDTO['description'],
			'id' => $formCateDTO['id']
		);
		$this->db->update($query, $param);
	}

	public function insert($formCateDTO){
		$query = "INSERT INTO form_cate (id_form_info, id_parent, code, name, type, description, created_date, updated_date)
		VALUES (:idFormInfo, :idParent, :code, :name, :type, :description, NOW(), NOW())";
		
		$param = array(
			'idFormInfo' => $formCateDTO['idFormInfo'],
			'idParent' => $formCateDTO['idParent'],
			'code' => $formCateDTO['code'],
			'name' => $formCateDTO['name'],
			'type' => $formCateDTO['type'],
			'description' => $formCateDTO['description']
		);
		return $this->db->insert($query, $param);
	}
}