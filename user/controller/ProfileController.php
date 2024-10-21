<?php

include_once("user/model/UserModel.php");

class ProfileController {

	private $userModel;

	public function __construct() {
		$this->userModel = new UserModel();
	}

	public function updateProfile(){
		$userInfo = $userInfo = $_SESSION[DataUtils::SESSION_LOGIN];
		$fullName = (isset($_POST['ip-full-name'])) ? $_POST['ip-full-name'] : '';
		$phone = (isset($_POST['ip-phone'])) ? $_POST['ip-phone'] : '';
		$address = (isset($_POST['ip-address'])) ? $_POST['ip-address'] : '';
		$birth = (isset($_POST['ip-birth'])) ? $_POST['ip-birth'] : '';
		$gender = (isset($_POST['ip-gender'])) ? $_POST['ip-gender'] : '';

		$userDTO = array(
			
		);
	}

}