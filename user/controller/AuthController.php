<?php
include_once("user/model/AuthModel.php");
include_once("user/view/AuthView.php");

class AuthController {

	private $authModel;
	private $authView;

	function __construct() {
		$this->authModel = new AuthModel();
		$this->authView = new AuthView();
	}

	public function login(){
		return $this->authView->login();
	}

	public function doLogin(){
		$username = (isset($_POST['ip-username'])) ? $_POST['ip-username'] : '';
		$password = (isset($_POST['ip-password'])) ? $_POST['ip-password'] : '';

		if($username == '' || $password == ''){
			//redirect to login form
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Tài khoản không tồn tại";
			header("Location: ?c=auth&m=login");
		}
		$passEncode = md5($password);
		$user = $this->authModel->selectByUsername($username);

		if($user === false){
			//User not found
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Tài khoản không tồn tại";
			header("Location: ?c=auth&m=login");
		}

		if($passEncode == $user['password']){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Đăng nhập thành công";
			$_SESSION[DataUtils::SESSION_LOGIN] = $user;
			header("Location: ?m=index");
		}else{
			//Password wrong
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Sai mật khẩu";
			header("Location: ?c=auth&m=login");
		}
	}

	public function register(){
		return $this->authView->register();
	}

	public function doRegister(){
		$email = (isset($_GET['ip-email'])) ? $_GET['ip-email'] : '';
		$password = (isset($_GET['ip-password'])) ? $_GET['ip-password'] : '';
		$fullName = (isset($_GET['ip-full-name'])) ? $_GET['ip-full-name'] : '';
		$phone = (isset($_GET['ip-phone'])) ? $_GET['ip-phone'] : '';
		$address = (isset($_GET['ip-address'])) ? $_GET['address-password'] : '';
		$birth = (isset($_GET['ip-birth'])) ? $_GET['ip-birth'] : '';
		$gender = (isset($_GET['ip-gender'])) ? $_GET['ip-gender'] : '';

		if($username == '' || $password == '' || $password == ''){
			//redirect to login form
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Thông tin không hợp lệ";
			header("Location: ?c=auth&m=login");
		}

		$user = $this->authModel->selectByUsername($username);
		if($user !== false){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Tài khoản đã được đăng ký";
			header("Location: ?c=auth&m=login");
		}

		$userDTO = array(
		);
	}

	public function forgot(){
		return $this->authView->forgot();	
	}

	public function doForgot(){
		//Coming soon
	}

	public function logout(){
		unset($_SESSION[DataUtils::SESSION_LOGIN]);
		header("Location: ?m=index");
	}
}