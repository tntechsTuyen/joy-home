<?php
include_once("../utils/MySQLUtils.php");
include_once("../utils/DataUtils.php");
include_once("../utils/HashUtils.php");
include_once("controller/AuthController.php");
include_once("controller/UserController.php");
include_once("controller/FormGroupController.php");
include_once("controller/FormInfoController.php");
include_once("controller/FormStepController.php");
include_once("controller/PackInfoController.php");
include_once("controller/OrderController.php");
include_once("controller/MessageController.php");
error_reporting(E_ERROR | E_PARSE);
session_start();
$c = (isset($_GET['c'])) ? $_GET['c'] : "user"; //class
//$loginSession = (isset($_SESSION['login_session'])) ? $_SESSION['login_session'] : null;
//if($loginSession == null) header("Location: ../user");
switch ($c) {
	case 'user':
		$controller = new UserController();
		break;
	case 'auth':
		$controller = new AuthController();
		break;
	case 'formGroup':
		$controller = new FormGroupController();
		break;
	case 'formInfo':
		$controller = new FormInfoController();
		break;
	case 'formStep':
		$controller = new FormStepController();
		break;
	case 'packInfo':
		$controller = new PackInfoController();
		break;
	case 'order':
		$controller = new OrderController();
		break;
	case 'message':
		$controller = new MessageController();
		break;
	default:
		// 404 not found
		break;
}
$m = (isset($_GET['m'])) ? $_GET['m'] : "list"; //method
$controller->$m();
