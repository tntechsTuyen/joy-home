<?php 
class RoleModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	public function selectAll(){
		$query = "
		SELECT id, code, name, description
		FROM role";
		return $this->db->selectList($query);
	}
}