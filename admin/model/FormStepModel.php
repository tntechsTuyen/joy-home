<?php 
class FormStepModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	function selectOne($id){
		$query = "SELECT *
		FROM form_step
		WHERE id = :id";
		$param = array(
			'id' => $id
		);
		return $this->db->selectOne($query, $param);
	}

	function selectByCode($code){
		$query = "SELECT fs.*, fi.name AS form_name
		FROM form_step fs 
		INNER JOIN form_cate fc ON fs.id_form_cate = fc.id 
		INNER JOIN form_info fi ON fc.id_form_info = fi.id
		WHERE fs.code = :code";
		$param = array(
			'code' => $code
		);
		return $this->db->selectOne($query, $param);
	}

	function selectByIdFormInfo($idFormInfo){
		$query = "SELECT fs.*
		FROM form_cate fc
		INNER JOIN form_step fs ON fc.id = fs.id_form_cate
		WHERE fc.id_form_info = :idFormInfo";
		$param = array(
			'idFormInfo' => $idFormInfo
		);
		return $this->db->selectList($query, $param);
	}

	function selectByidFormCate($idFormCate){
		$query = "SELECT *
		FROM form_step
		WHERE id_form_cate = :idFormCate";
		$param = array(
			'idFormCate' => $idFormCate
		);
		return $this->db->selectList($query, $param);
	}

	public function updateName($code, $name){
		$query = "UPDATE form_step 
		SET name = :name 
		WHERE code = :code";
		$param = array(
			'code' => $code,
			'name' => $name
		);
		$this->db->update($query, $param);
	}

	public function update($formStepDTO){
		$query = "UPDATE form_step
		SET id_form_cate = :idFormCate
			, name = :name
			, content = :content
			, id_type = :idType
			, updated_date = NOW()
		WHERE id = :id";
		$param = array(
			'idFormCate' => $formStepDTO['idFormCate'],
			'name' => $formStepDTO['name'],
			'content' => $formStepDTO['content'],
			'idType' => $formStepDTO['idType'],
			'id' => $formStepDTO['id']
		);
		$this->db->update($query, $param);
	}

	public function updateByCode($formStepDTO){
		$query = "UPDATE form_step 
		SET name = :name 
		, id_type = :idType
		, content = :content
		WHERE code = :code";
		$param = array(
			'code'=> $formStepDTO['code'],
			'name'=> $formStepDTO['name'],
			'idType'=> $formStepDTO['idType'],
			'content'=> $formStepDTO['content'],
		);
		$this->db->update($query, $param);
	}

	public function insert($formStepDTO){
		$query = "INSERT INTO form_step (id_form_cate, code, name, content, id_type, created_date, updated_date)
		VALUES (:idFormCate, :code, :name, :content, :idType, NOW(), NOW())";
		
		$param = array(
			'idFormCate' => $formStepDTO['idFormCate'],
			'code' => $formStepDTO['code'],
			'name' => $formStepDTO['name'],
			'content' => $formStepDTO['content'],
			'idType' => $formStepDTO['idType']
		);
		return $this->db->insert($query, $param);
	}
}