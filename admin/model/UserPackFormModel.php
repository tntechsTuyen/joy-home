<?php 

class UserPackFormModel {
	function __construct(){
		$this->db = new MySQLUtils();
	}

	function insert($userPackFormDTO){
		$query = "INSERT INTO user_pack_form (id_user, id_order, id_form_info, id_pack_info, code, process, id_status, created_date, updated_date) 
		VALUES (:idUser, :idOrder, :idFormInfo, :idPackInfo, :code, :process, :idStatus, NOW(), NOW())";
		$param = array(
			"idUser" => $userPackFormDTO['idUser'],
			"idOrder" => $userPackFormDTO['idOrder'],
			"idFormInfo" => $userPackFormDTO['idFormInfo'],
			"idPackInfo" => $userPackFormDTO['idPackInfo'],
			"code" => $userPackFormDTO['code'],
			"process" => $userPackFormDTO['process'],
			"idStatus" => $userPackFormDTO['idStatus']
		);
		return $this->db->insert($query, $param);
	}
}