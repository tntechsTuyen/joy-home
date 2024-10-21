<?php 
include_once("model/AuthModel.php");
include_once("view/AuthView.php");

class AuthController{
	private $authModel = null;
	private $authView = null;

	public function __construct(){
		$this->authModel = new AuthModel();
		$this->authView = new AuthView();
	}

	public function goLogin(){
		$this->authView->goLogin();
	}

	public function doLogin(){
		$username = (isset($_POST['ip-username'])) ? $_POST['ip-username'] : null;
		$password = (isset($_POST['ip-password'])) ? $_POST['ip-password'] : null;

		if($username == null || $password == null){
			//redirect to login form
			header("Location: ?c=auth&m=goLogin");
		}
		$passEncode = md5($password);
		$user = $this->authModel->selectByUsername($username);

		if($user === false){
			//User not found
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Tài khoản không tồn tại";
			header("Location: ?c=user&m=login");
		}

		if($passEncode == $user['password']){
			$_SESSION[DataUtils::SESSION_LOGIN] = $user;
			if($user['role'] == "ADMIN"){
				header("Location: ../admin");
			}else{
				header("Location: ?");
			}
		}else{
			//Password wrong
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Sai mật khẩu";
			header("Location: ?c=user&m=login");
		}
	}
}