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
		$query = "SELECT *
		FROM post
		WHERE (:code = '' OR code = :code)
		AND (:key = '' OR key = :key) 
		AND (:name = '' OR name = :name) 
		ORDER BY id DESC
		LIMIT $start, $limit";
		$param = array(
			'code' => $search['code'],
			'key' => $search['key'],
			'name' => $search['name']
		);
		return $this->db->selectList($query, $param);
	}

	public function selectCount($search){
		$query = "SELECT *
		FROM post
		WHERE (:code = '' OR code = :code)
		AND (:key = '' OR key = :key) 
		AND (:name = '' OR name = :name) ";
		$param = array(
			'code' => $search['code'],
			'key' => $search['key'],
			'name' => $search['name']
		);
		return $this->db->selectCount($query, $param);
	}

	public function update($postDTO){
		$query = "UPDATE post
		SET name = :name
			, content = :content
			, thumb = :thumb
			, id_type = :idType
			, id_status = :idStatus
			, updated_date = NOW()
		WHERE id = :id";
		$param = array(
			'name' => $postDTO['name'],
			'content' => $postDTO['content'],
			'thumb' => $postDTO['thumb'],
			'id_type' => $postDTO['idType'],
			'idStatus' => $postDTO['idStatus'],
			'id' => $postDTO['id']
		);
		$this->db->update($query, $param);
	}

	public function insert($postDTO){
		$query = "INSERT INTO post (code, key, name, content, thumb, id_type, id_status, created_date, updated_date)
		VALUES (:code, :key, :name, :content, :thumb, :idType, :idStatus, NOW(), NOW())";
		
		$param = array(
			'code' => $postDTO['code'],
			'key' => $postDTO['key'],
			'name' => $postDTO['name'],
			'content' => $postDTO['content'],
			'thumb' => $postDTO['thumb'],
			'id_type' => $postDTO['idType'],
			'idStatus' => $postDTO['idStatus'],
		);
		return $this->db->insert($query, $param);
	}
}