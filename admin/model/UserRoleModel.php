<?php 
	class RoleModel{
		function __construct(){
			$this->db = new MySQLUtils();
		}

		public function selectByIdUser($idUser){
			$query = "
			SELECT r.id, r.code, r.name, r.description
			FROM user_role ur 
			INNER JOIN role r ON ur.id_role = r.id 
			WHERE ur.id_user = :id_user ";
			$param = array(
				'id_user' => $idUser
			);
			return $this->db->selectList($query, $param);
		}
	}