<?php 

class UserPackFormStepModel {
	function __construct(){
		$this->db = new MySQLUtils();
	}

	function insertByForm($idUserPackForm, $idForm){
		$query = "INSERT INTO user_pack_form_step (id_user_pack_form, id_step_info, code, id_status, created_date, updated_date) 
		SELECT :idUserPackForm, fs.id, UUID(), 12, NOW(), NOW() 
		FROM form_info fi 
		INNER JOIN form_cate fc ON fc.id_form_info = fi.id 
		INNER JOIN form_step fs ON fs.id_form_cate = fc.id 
		WHERE fi.id = :idForm ";
		$param = array(
			"idUserPackForm" => $idUserPackForm,
			"idForm" => $idForm
		);
		$this->db->insert($query, $param);
	}
}