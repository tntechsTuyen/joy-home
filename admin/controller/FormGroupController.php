<?php 
include_once("model/FormGroupModel.php");
include_once("view/FormGroupView.php");

class FormGroupController{
	private $formGroupModel;
    private $formGroupView;

    public function __construct(){
		$this->formGroupModel = new FormGroupModel();
        $this->formGroupView = new FormGroupView();
	}

	public function list(){
		$code = (isset($_GET['ip-code'])) ? $_GET['ip-code'] : '';
		$name = (isset($_GET['ip-name'])) ? $_GET['ip-name'] : '';
		$page = (isset($_GET['ip-page'])) ? $_GET['ip-page'] : 1;

		$search = array(
			"code"=> $code,
			"name"=> $name,
			"page" => $page,
			"limit" => DataUtils::DATA_PAGE_LIMIT
		);

		$list = $this->formGroupModel->selectList($search);
		$count = $this->formGroupModel->selectCount($search);
		$search['count'] = $count;
		$this->formGroupView->goList($search, $list);
	}

	public function goAdd(){
		$this->formGroupView->goAdd();
	}

	public function doAdd(){
		$name = (isset($_POST['ip-name'])) ? $_POST['ip-name'] : null;
		$description = (isset($_POST['ip-description'])) ? $_POST['ip-description'] : null;

		$formGroupDTO = array(
			'code' => HashUtils::UUID(),
			'name' => $name,
			'description' => $description,
		);

		$id = $this->formGroupModel->insert($formGroupDTO);
		
		$_SESSION[DataUtils::SESSION_MESSAGE] = "Đăng ký thành công";
		header("Location: ?c=formGroup&m=list");
	}

	public function goUpdate(){
		$code = (isset($_GET['code'])) ? $_GET['code'] : null;
		$formGroup = $this->formGroupModel->selectByCode($code);
		$this->formGroupView->goUpdate($formGroup);
	}

	public function doUpdate(){
		$code = (isset($_POST['ip-code'])) ? $_POST['ip-code'] : null;
		$name = (isset($_POST['ip-name'])) ? $_POST['ip-name'] : null;
		$description = (isset($_POST['ip-description'])) ? $_POST['ip-description'] : null;
		
		$formGroup = $this->formGroupModel->selectByCode($code);
		
		if($formGroup === false) {
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?c=formGroup&m=list");
		}

		$formGroupDTO = array(
			'id' => $formGroup['id'],
			'code' => $code,
			'name' => $name,
			'description' => $description,
		);
		$this->formGroupModel->update($formGroupDTO);
		$_SESSION[DataUtils::SESSION_MESSAGE] = "Cập nhật thành công";
        header("Location: ?c=formGroup&m=list");
	}
}