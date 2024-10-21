<?php 
class StatusModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	public function selectAll(){
		$query = "
		SELECT id, code, name, description, tbl_name
		FROM status";
		return $this->db->selectList($query);
	}

	public function selectByTblName($tblName){
		$query = "
		SELECT id, code, name, description, tbl_name
		FROM status
		WHERE tbl_name = :tbl_name";
		$param = array(
			'tbl_name' => $tblName
		);
		return $this->db->selectList($query, $param);
	}
}