<?php 

include_once("model/FormStepModel.php");
include_once("model/FormCateModel.php");

class FormStepController{
	private $formStepModel;
	private $formCateModel;

    public function __construct(){
		$this->formStepModel = new FormStepModel();
		$this->formCateModel = new FormCateModel();
	}

	public function doUpdate(){
		$code = (isset($_POST['ip-code'])) ? $_POST['ip-code'] : null;
		$name = (isset($_POST['ip-name'])) ? $_POST['ip-name'] : null;
		$type = (isset($_POST['ip-type'])) ? $_POST['ip-type'] : null;
		$content = (isset($_POST['ip-content'])) ? $_POST['ip-content'] : null;

		$formStepDTO = array(
			'code' => $code,
			'name' => $name,
			'idType' => $type,
			'content' => $content,
		);
		$this->formStepModel->updateByCode($formStepDTO);
		$this->formCateModel->updateName($code, $name);
		$_SESSION[DataUtils::SESSION_MESSAGE] = "Cập nhật thành công";
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
}