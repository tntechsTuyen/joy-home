<?php 
include_once("utils/MySQLUtils.php");
include_once("utils/DataUtils.php");
include_once("utils/HashUtils.php");
include_once("user/controller/IndexController.php");
include_once("user/controller/AuthController.php");
include_once("user/controller/OrderController.php");
include_once("user/controller/CourseController.php");

error_reporting(E_ERROR | E_PARSE);
session_start();
$c = (isset($_GET['c'])) ? $_GET['c'] : "index"; //class
//$loginSession = (isset($_SESSION['login_session'])) ? $_SESSION['login_session'] : null;
//if($loginSession == null) header("Location: ../user");
switch ($c) {
	case 'index':
		$controller = new IndexController();
		break;
	case 'auth':
		$controller = new AuthController();
		break;
	case 'order':
		$controller = new OrderController();
		break;
	case 'courses':
		$controller = new CourseController();
		break;
	default:
		// 404 not found
		break;
}

$m = (isset($_GET['m'])) ? $_GET['m'] : "index"; //method
$controller->$m();