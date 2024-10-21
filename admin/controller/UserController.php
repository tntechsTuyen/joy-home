<?php 
include_once("model/UserModel.php");
include_once("model/RoleModel.php");
include_once("model/StatusModel.php");
include_once("view/UserView.php");

class UserController{
	private $userModel;
	private $roleModel;
	private $statusModel;
    private $userView;

    public function __construct(){
		$this->userModel = new UserModel();
		$this->roleModel = new RoleModel();
    	$this->statusModel = new StatusModel();
        $this->userView = new UserView();
	}

	public function list(){
		$username = (isset($_GET['ip-username'])) ? $_GET['ip-username'] : '';
		$fullName = (isset($_GET['ip-full-name'])) ? $_GET['ip-full-name'] : '';
		$email = (isset($_GET['ip-email'])) ? $_GET['ip-email'] : '';
		$phone = (isset($_GET['ip-phone'])) ? $_GET['ip-phone'] : '';
		$page = (isset($_GET['ip-page'])) ? $_GET['ip-page'] : 1;

		$search = array(
			"username"=> $username,
			"full_name"=> $fullName,
			"email"=> $email,
			"phone"=> $phone,
			"page" => $page,
			"limit" => DataUtils::DATA_PAGE_LIMIT
		);

		$list = $this->userModel->selectList($search);
		$count = $this->userModel->selectCount($search);
		$search['count'] = $count;
		$this->userView->goList($search, $list);
	}

	public function goAdd(){
		$role = $this->roleModel->selectAll();
		$status = $this->statusModel->selectByTblName('user');
		$this->userView->goAdd($role, $status);
	}

	public function doAdd(){
		$username = (isset($_POST['ip-username'])) ? $_POST['ip-username'] : null;
		$password = (isset($_POST['ip-password'])) ? $_POST['ip-password'] : null;
		$fullName = (isset($_POST['ip-full-name'])) ? $_POST['ip-full-name'] : null;
		$email = (isset($_POST['ip-email'])) ? $_POST['ip-email'] : null;
		$phone = (isset($_POST['ip-phone'])) ? $_POST['ip-phone'] : null;
		$address = (isset($_POST['ip-address'])) ? $_POST['ip-address'] : null;
		$birth = (isset($_POST['ip-birth'])) ? $_POST['ip-birth'] : null;
		$gender = (isset($_POST['ip-gender'])) ? $_POST['ip-gender'] : null;
		$role = (isset($_POST['ip-role'])) ? $_POST['ip-role'] : null;

		$user = $this->userModel->selectByUsername($username);
		if($user !== false) {
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Tài khoản đã tồn tại";
			if (isset($_SERVER["HTTP_REFERER"])) {
		        header("Location: " . $_SERVER["HTTP_REFERER"]);
		    }
		}

		$userDTO = array(
			'uuid' => HashUtils::UUID(),
			'username' => $username,
			'password' => md5($password),
			'fullName' => $fullName,
			'email' => $email,
			'phone' => $phone,
			'address' => $address,
			'birth' => $birth,
			'gender' => $gender,
			'avatarUrl' => '',
			'idRole' => $role,
			'idStatus' => 1
		);

		$id = $this->userModel->insert($userDTO);
		$_SESSION[DataUtils::SESSION_MESSAGE] = "Đăng ký thành công";
		header("Location: ?c=user&m=list");
	}

	public function goUpdate(){
		$username = (isset($_GET['username'])) ? $_GET['username'] : null;
		$user = $this->userModel->selectByUsername($username);

		if($user === false) {
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?c=user&m=list");
		}
		
		$role = $this->roleModel->selectAll();
		$status = $this->statusModel->selectByTblName('user');
		$this->userView->goUpdate($user, $role, $status);
	}

	public function doUpdate(){
		$uuid = (isset($_POST['ip-uuid'])) ? $_POST['ip-uuid'] : null;
		$password = (isset($_POST['ip-password'])) ? $_POST['ip-password'] : null;
		$fullName = (isset($_POST['ip-full-name'])) ? $_POST['ip-full-name'] : null;
		$email = (isset($_POST['ip-email'])) ? $_POST['ip-email'] : null;
		$phone = (isset($_POST['ip-phone'])) ? $_POST['ip-phone'] : null;
		$address = (isset($_POST['ip-address'])) ? $_POST['ip-address'] : null;
		$birth = (isset($_POST['ip-birth'])) ? $_POST['ip-birth'] : null;
		$gender = (isset($_POST['ip-gender'])) ? $_POST['ip-gender'] : null;
		$role = (isset($_POST['ip-role'])) ? $_POST['ip-role'] : null;
		
		$userDTO = array(
			'uuid' => $uuid,
			'password' => ($password != null && strlen(trim($password)) > 0) ? md5($password) : "",
			'fullName' => $fullName,
			'email' => $email,
			'phone' => $phone,
			'address' => $address,
			'birth' => $birth,
			'gender' => $gender,
			'avatarUrl' => '',
			'idRole' => $role,
			'idStatus' => 1
		);
		$this->userModel->update($userDTO);
		$_SESSION[DataUtils::SESSION_MESSAGE] = "Cập nhật thành công";
        header("Location: ?c=user&m=list");
	}
}