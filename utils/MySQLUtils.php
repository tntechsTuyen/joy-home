<?php 
	class MySQLUtils {
		private static $conn = null;
		private $servername = "localhost";
		private $username = "root";
		private $password = "12345678";

		function __construct() {
			try {
			  self::$conn = new PDO("mysql:host=$servername;dbname=joy_home;port=3307", $this->username, $this->password);
			  // set the PDO error mode to exception
			  self::$conn->exec("set names utf8mb4");
			  self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {

			}
		}

		public function selectList($query, $param = null){
			$stmt = self::$conn->prepare($query);
		  	$stmt->execute($param);
		  	$stmt->setFetchMode(PDO::FETCH_ASSOC);
		  	$result = $stmt->fetchAll();
		  	return $result;
		}

		public function selectListSingle($query, $param = null){
			$stmt = self::$conn->prepare($query);
		  	$stmt->execute($param);
		  	$result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
		  	return $result;
		}

		public function selectCount($query, $param = null){
			$stmt = self::$conn->prepare($query);
		  	$stmt->execute($param);
		  	$stmt->setFetchMode(PDO::FETCH_ASSOC);
		  	return $stmt->rowCount();
		}

		public function selectOne($query, $param = null){
			$stmt = self::$conn->prepare($query);
		  	$stmt->execute($param);
		  	$stmt->setFetchMode(PDO::FETCH_ASSOC);
		  	$result = $stmt->fetch();
		  	return $result;
		}

		public function insert($query, $param = null){
			$stmt = self::$conn->prepare($query);
		  	$stmt->execute($param);
		  	$id = self::$conn->lastInsertId();
		  	return $id;
		}

		public function update($query, $param = null){
			$stmt = self::$conn->prepare($query);
		  	$stmt->execute($param);
		  	return true;
		}

		public function delete($query, $param = null){
			$stmt = self::$conn->prepare($query);
		  	$stmt->execute($param);
		  	return true;
		}

		public function disconnect(){
			self::$conn = null;
		}
	}
?>