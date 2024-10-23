<?php 
class PostModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	public function selectOne($id){
		$query = "SELECT *
		FROM post
		WHERE id = :id";
		$param = array(
			'id' => $id
		);
		return $this->db->selectOne($query, $param);
	}

	public function selectByCode($code){
		$query = "SELECT *
		FROM post
		WHERE code = :code";
		$param = array(
			'code' => $code
		);
		return $this->db->selectOne($query, $param);
	}

	public function selectByKey($key){
		$query = "SELECT *
		FROM post
		WHERE key = :key";
		$param = array(
			'key' => $key
		);
		return $this->db->selectList($query, $param);
	}

	public function selectList($search){
		$start = $search['limit'] * ($search['page']-1);
		$limit = $search['limit'];
		$query = "SELECT p.*
		, t.name AS type_name, s.name AS status_name
		, c.name AS key_name
		FROM post p
		INNER JOIN type t ON p.id_type = t.id
		INNER JOIN status s ON p.id_status = s.id
		INNER JOIN config c ON p.key = c.key
		WHERE (:code = '' OR p.code = :code)
		AND (:key = '' OR p.`key` = :key) 
		AND (:name = '' OR p.name = :name) 
		AND (:idType = '' OR p.id_type = :idType) 
		AND (:idStatus = '' OR p.id_status = :idStatus) 
		ORDER BY p.id DESC
		LIMIT $start, $limit";
		$param = array(
			'code' => $search['code'],
			'key' => $search['key'],
			'name' => $search['name'],
			'idType' => $search['idType'],
			'idStatus' => $search['idStatus'],
		);
		return $this->db->selectList($query, $param);
	}

	public function selectCount($search){
		$query = "SELECT *
		FROM post p
		WHERE (:code = '' OR p.code = :code)
		AND (:key = '' OR p.`key` = :key) 
		AND (:name = '' OR p.name = :name) 
		AND (:idType = '' OR p.id_type = :idType) 
		AND (:idStatus = '' OR p.id_status = :idStatus) ";
		$param = array(
			'code' => $search['code'],
			'key' => $search['key'],
			'name' => $search['name'],
			'idType' => $search['idType'],
			'idStatus' => $search['idStatus'],
		);
		return $this->db->selectCount($query, $param);
	}

	public function update($postDTO){
		$query = "UPDATE post
		SET name = :name
			, `key` = :key
			, description = :description
			, content = :content
			, thumb = :thumb
			, id_type = :idType
			, id_status = :idStatus
			, updated_date = NOW()
		WHERE id = :id";
		$param = array(
			'name' => $postDTO['name'],
			'key' => $postDTO['key'],
			'content' => $postDTO['content'],
			'description' => $postDTO['description'],
			'thumb' => $postDTO['thumb'],
			'idType' => $postDTO['idType'],
			'idStatus' => $postDTO['idStatus'],
			'id' => $postDTO['id']
		);
		$this->db->update($query, $param);
	}

	public function insert($postDTO){
		$query = "INSERT INTO post (code, `key`, name, content, description, thumb, id_type, id_status, created_date, updated_date)
		VALUES (:code, :key, :name, :content, :description, :thumb, :idType, :idStatus, NOW(), NOW())";
		
		$param = array(
			'code' => $postDTO['code'],
			'key' => $postDTO['key'],
			'name' => $postDTO['name'],
			'content' => $postDTO['content'],
			'description' => $postDTO['description'],
			'thumb' => $postDTO['thumb'],
			'idType' => $postDTO['idType'],
			'idStatus' => $postDTO['idStatus'],
		);
		return $this->db->insert($query, $param);
	}
}