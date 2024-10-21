<?php 
include_once("model/PackInfoModel.php");
include_once("model/PackFormModel.php");
include_once("view/PackInfoView.php");

class PackInfoController{
	private $packInfoModel;
	private $packFormModel;
	private $packInfoView;

    public function __construct(){
    	$this->packInfoModel = new PackInfoModel();
    	$this->packFormModel = new PackFormModel();
    	$this->packInfoView = new PackInfoView();
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

		$list = $this->packInfoModel->selectList($search);
		$count = $this->packInfoModel->selectCount($search);
		$search['count'] = $count;

		$this->packInfoView->goList($search, $list);
	}

	public function goAdd(){
		$this->packInfoView->goAdd();
	}

	public function doAdd(){
		$name = (isset($_POST['ip-name'])) ? $_POST['ip-name'] : null;
		$description = (isset($_POST['ip-description'])) ? $_POST['ip-description'] : null;
		$price = (isset($_POST['ip-price'])) ? $_POST['ip-price'] : null;

		$formInfoDTO = array(
			'code' => HashUtils::UUID(),
			'name' => $name,
			'description' => $description,
			'price' => $price,
		);
		$idFormInfo = $this->packInfoModel->insert($formInfoDTO);

		$_SESSION[DataUtils::SESSION_MESSAGE] = "Đăng ký thành công";
		header("Location: ?c=packInfo&m=list");
	}

	public function goUpdate(){
		$code = (isset($_GET['code'])) ? $_GET['code'] : null;
		$packInfo = $this->packInfoModel->selectByCode($code);

		if($packInfo === false) {
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?c=packInfo&m=list");
		}
		$packForms = $this->packFormModel->selectFormByIdPack($packInfo['id']);
		$setupForms = $this->packFormModel->selectSetupFromByIdPack($packInfo['id']);
		$this->packInfoView->goUpdate($packInfo, $packForms, $setupForms);
	}

	public function doUpdate(){
		$code = (isset($_POST['ip-code'])) ? $_POST['ip-code'] : null;
		$name = (isset($_POST['ip-name'])) ? $_POST['ip-name'] : null;
		$description = (isset($_POST['ip-description'])) ? $_POST['ip-description'] : null;
		$price = (isset($_POST['ip-price'])) ? $_POST['ip-price'] : null;
		
		$packInfo = $this->packInfoModel->selectByCode($code);
		
		if($packInfo === false) {
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?c=packInfo&m=list");
		}

		$packInfoDTO = array(
			'id' => $packInfo['id'],
			'code' => $code,
			'name' => $name,
			'description' => $description,
			'price' => $price
		);
		$this->packInfoModel->update($packInfoDTO);
		$_SESSION[DataUtils::SESSION_MESSAGE] = "Cập nhật thành công";
        header("Location: ?c=packInfo&m=list");
	}

	public function updateForm(){
		$idForms = (isset($_POST['cb-setup-form'])) ? $_POST['cb-setup-form'] : null;
		$code = (isset($_POST['ip-code'])) ? $_POST['ip-code'] : null;

		$packInfo = $this->packInfoModel->selectByCode($code);
		
		if($packInfo === false) {
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?c=packInfo&m=list");
		}

		$this->packFormModel->activePackForm($packInfo['id'], $idForms);
		$this->packFormModel->unactivePackForm($packInfo['id'], $idForms);

		$formOld = $this->packFormModel->selectIdFormByIdPack($packInfo['id']);
		$formNew = array_diff($idForms, $formOld);
		if(count($formNew) > 0){
			foreach ($formNew as $key => $item){
				$packFormDTO = array(
					'idPackInfo' => $packInfo['id'],
					'idFormInfo' => $item,
					'idStatus' => 3
				);
				$this->packFormModel->insert($packFormDTO);				
			}
		}
		$_SESSION[DataUtils::SESSION_MESSAGE] = "Cập nhật thành công";
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
}