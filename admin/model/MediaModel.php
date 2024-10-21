<?php 
class MediaModel{
	function __construct(){
		$this->db = new MySQLUtils();
	}

	function selectOne($id){
		$query = "SELECT *
		FROM media
		WHERE id = :id";
		$param = array(
			'id' => $id
		);
		return $this->db->selectOne($query, $param);
	}

	function selectByCode($code){
		$query = "SELECT *
		FROM media
		WHERE code = :code";
		$param = array(
			'code' => $code
		);
		return $this->db->selectOne($query, $param);
	}

	public function insert($mediaDTO){
		$query = "INSERT INTO media (id_user, id_type, code, name, tmp_name, `path`, size, created_date)
		VALUES (:idUser, :idType, :code, :name, :tmpName, :path, :size, NOW())";
		
		$param = array(
			'idUser' => $mediaDTO['idUser'],
			'idType' => $mediaDTO['idType'],
			'code' => $mediaDTO['code'],
			'name' => $mediaDTO['name'],
			'tmpName' => $mediaDTO['tmpName'],
			'path' => $mediaDTO['path'],
			'size' => $mediaDTO['size']
		);
		return $this->db->insert($query, $param);
	}
}