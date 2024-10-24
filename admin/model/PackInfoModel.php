<?php 
class PackInfoModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	function selectOne($id){
		$query = "SELECT *
		FROM pack_info
		WHERE id = :id";
		$param = array(
			'id' => $id
		);
		return $this->db->selectOne($query, $param);
	}

	function selectByCode($code){
		$query = "SELECT *
		FROM pack_info
		WHERE code = :code";
		$param = array(
			'code' => $code
		);
		return $this->db->selectOne($query, $param);
	}

	public function selectAll(){
		$query = "SELECT *
		FROM pack_info ";
		return $this->db->selectList($query, null);
	}

	public function selectList($search){
		$start = $search['limit'] * ($search['page']-1);
		$limit = $search['limit'];
		$query = "SELECT *
		FROM pack_info
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
		FROM pack_info
		WHERE (:code = '' OR code = :code)
		AND (:name = '' OR name = :name) ";
		$param = array(
			'code' => $search['code'],
			'name' => $search['name']
		);
		return $this->db->selectCount($query, $param);
	}

	public function update($packInfoDTO){
		$query = "UPDATE pack_info
		SET name = :name
			, description = :description
			, content_html = :contentHtml
			, price = :price
			, updated_date = NOW()
		WHERE id = :id";
		$param = array(
			'name' => $packInfoDTO['name'],
			'description' => $packInfoDTO['description'],
			'contentHtml' => $packInfoDTO['contentHtml'],
			'price' => $packInfoDTO['price'],
			'id' => $packInfoDTO['id']
		);
		$this->db->update($query, $param);
	}

	public function insert($packInfoDTO){
		$query = "INSERT INTO pack_info (code, name, description, content_html, price, created_date, updated_date)
		VALUES (:code, :name, :description, :contentHtml, :price, NOW(), NOW())";
		
		$param = array(
			'code' => $packInfoDTO['code'],
			'name' => $packInfoDTO['name'],
			'description' => $packInfoDTO['description'],
			'contentHtml' => $packInfoDTO['contentHtml'],
			'price' => $packInfoDTO['price']
		);
		return $this->db->insert($query, $param);
	}
}