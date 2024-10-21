<?php 
include_once("model/FormCateModel.php");
include_once("model/FormInfoModel.php");
include_once("model/FormGroupModel.php");
include_once("model/TypeModel.php");
include_once("view/FormInfoView.php");

class FormInfoController{
	private $formCateModel;
	private $formInfoModel;
    private $formInfoView;
    private $formGroupModel;
    private $typeModel;

    public function __construct(){
		$this->formCateModel = new FormCateModel();
		$this->formInfoModel = new FormInfoModel();
		$this->formGroupModel = new FormGroupModel();
		$this->typeModel = new TypeModel();
        $this->formInfoView = new FormInfoView();
	}

	public function list(){
		$idFormGroup = (isset($_GET['ip-form-group'])) ? $_GET['ip-form-group'] : '';
		$code = (isset($_GET['ip-code'])) ? $_GET['ip-code'] : '';
		$name = (isset($_GET['ip-name'])) ? $_GET['ip-name'] : '';
		$page = (isset($_GET['ip-page'])) ? $_GET['ip-page'] : 1;
		
		$search = array(
			"idFormGroup"=> $idFormGroup,
			"code"=> $code,
			"name"=> $name,
			"page" => $page,
			"limit" => DataUtils::DATA_PAGE_LIMIT
		);

		$list = $this->formInfoModel->selectList($search);
		$count = $this->formInfoModel->selectCount($search);
		$search['count'] = $count;

		$formGroups = $this->formGroupModel->selectAll();

		$this->formInfoView->goList($search, $formGroups, $list);
	}

	public function goAdd(){
		$formGroups = $this->formGroupModel->selectAll();
		$this->formInfoView->goAdd($formGroups);
	}

	public function doAdd(){
		$idFormGroup = (isset($_POST['ip-form-group'])) ? $_POST['ip-form-group'] : '';
		$name = (isset($_POST['ip-name'])) ? $_POST['ip-name'] : null;
		$description = (isset($_POST['ip-description'])) ? $_POST['ip-description'] : null;
		$htmlContent = (isset($_POST['ip-html-content'])) ? $_POST['ip-html-content'] : null;
		$thumbUrl = (isset($_POST['ip-thumb-url'])) ? $_POST['ip-thumb-url'] : null;

		$formInfoDTO = array(
			'idFormGroup' => $idFormGroup,
			'code' => HashUtils::UUID(),
			'name' => $name,
			'description' => $description,
			'htmlContent' => $htmlContent,
			'thumbUrl' => $thumbUrl,
			'idStatus' => 1,
		);
		$idFormInfo = $this->formInfoModel->insert($formInfoDTO);

		$formCateDTO = array(
			'idFormInfo' => $idFormInfo,
			'idParent' => 0,
			'idStatus' => 1,
			'code' => HashUtils::UUID(),
			'name' => 'ROOT',
			'description' => 'ROOT MAIN'
		);
		$idFormCate = $this->formCateModel->insert($formCateDTO);

		$_SESSION[DataUtils::SESSION_MESSAGE] = "Đăng ký thành công";
		header("Location: ?c=formInfo&m=list");
	}

	public function goUpdate(){
		$code = (isset($_GET['code'])) ? $_GET['code'] : null;
		$formInfo = $this->formInfoModel->selectByCode($code);
		$formGroups = $this->formGroupModel->selectAll();
		$types = $this->typeModel->selectByTblName('form_step');
		$this->formInfoView->goUpdate($formInfo, $formGroups, $types);
	}

	public function doUpdate(){
		$code = (isset($_POST['ip-code'])) ? $_POST['ip-code'] : null;
		$idFormGroup = (isset($_POST['ip-form-group'])) ? $_POST['ip-form-group'] : '';
		$name = (isset($_POST['ip-name'])) ? $_POST['ip-name'] : null;
		$description = (isset($_POST['ip-description'])) ? $_POST['ip-description'] : null;
		$htmlContent = (isset($_POST['ip-html-content'])) ? $_POST['ip-html-content'] : null;
		$thumbUrl = (isset($_POST['ip-thumb-url'])) ? $_POST['ip-thumb-url'] : null;
		
		$formInfo = $this->formInfoModel->selectByCode($code);
		
		if($formInfo === false) {
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?c=formInfo&m=list");
		}

		$formInfoDTO = array(
			'id' => $formInfo['id'],
			'idFormGroup' => $idFormGroup,
			'code' => $code,
			'name' => $name,
			'description' => $description,
			'htmlContent' => $htmlContent,
			'thumbUrl' => $thumbUrl,
			'idStatus' => 1,
		);
		$this->formInfoModel->update($formInfoDTO);
		$_SESSION[DataUtils::SESSION_MESSAGE] = "Cập nhật thành công";
        header("Location: ?c=formInfo&m=list");
	}
}