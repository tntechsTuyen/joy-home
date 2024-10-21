<?php 
class PackInfoModel {
	function __construct(){
		$this->db = new MySQLUtils();
	}

	function selectList($search){
		$start = $search['limit'] * ($search['page']-1);
		$limit = $search['limit'];
		$query = "
		SELECT *
		FROM pack_info
		WHERE (:code = '' OR code = :code)
		ORDER BY id DESC
		LIMIT $start, $limit";
		$param = array(
			'code' => $search['code']
		);
		return $this->db->selectList($query, $param);
	}

	function selectAll(){
		$query = "
		SELECT *
		FROM pack_info";
		return $this->db->selectList($query, null);
	}

	function selectByCode($code){
		$query = "
		SELECT *
		FROM pack_info
		WHERE code = :code";
		$param = array(
			'code' => $code
		);
		return $this->db->selectOne($query, $param);
	}
}
