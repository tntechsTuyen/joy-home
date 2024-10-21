<?php
include_once("../utils/MySQLUtils.php");
include_once("../utils/DataUtils.php");
include_once("../utils/HashUtils.php");
include_once("../utils/FileUtils.php");
include_once("../utils/ApiResponseUtils.php");
include_once("api/CommonApi.php");
include_once("api/FormCateApi.php");
include_once("api/FormStepApi.php");
include_once("api/MediaApi.php");
header('Content-type: application/json');
error_reporting(E_ERROR | E_PARSE);
session_start();
$c = (isset($_GET['c'])) ? $_GET['c'] : "common"; //class
//$loginSession = (isset($_SESSION['login_session'])) ? $_SESSION['login_session'] : null;
//if($loginSession == null) header("Location: ../user");
switch ($c) {
	case 'formCate':
		$api = new FormCateApi();
		break;
	case 'formStep':
		$api = new FormStepApi();
		break;
	case 'media':
		$api = new MediaApi();
		break;
	default:
		// 404 not found
		$api = new CommonApi();
		break;
}
$m = (isset($_GET['m'])) ? $_GET['m'] : "r404"; //method
echo $api->$m();
