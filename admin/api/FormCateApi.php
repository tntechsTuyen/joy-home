<?php 
include_once("model/FormCateModel.php");
include_once("model/FormInfoModel.php");

class FormCateApi {
	private $formCateModel;
	private $formInfoModel;

    public function __construct(){ 
    	$this->formCateModel = new FormCateModel();
    	$this->formInfoModel = new FormInfoModel();
    }

    public function save(){
    	$id = (isset($_POST['id'])) ? $_POST['id'] : 0;
    	$idParent = (isset($_POST['id_parent'])) ? $_POST['id_parent'] : null;
    	$name = (isset($_POST['name'])) ? $_POST['name'] : null;

    	$cateParent = $this->formCateModel->selectOne($idParent);
    	if($cateParent === false) return ApiResponseUtils::ERROR(400, 'Lỗi hệ thống', $idParent);

    	$formCateDTO = array(
    		'id' => $id,
    		'idFormInfo' => $cateParent['id_form_info'],
    		'idParent' => $idParent,
    		'code' => HashUtils::UUID(),
            'type' => 'default',
    		'name' => $name,
    		'description' => $name
    	);

    	if($id == 0){
    		$formCateDTO['id'] = $this->formCateModel->insert($formCateDTO);
    	} else {
    		$this->formCateModel->update($formCateDTO);
    	}
    	return ApiResponseUtils::SUCCESS('Thành công', $formCateDTO);

    }

    public function getCateByForm(){
    	$code = (isset($_GET['code'])) ? $_GET['code'] : null;

    	$formInfo = $this->formInfoModel->selectByCode($code);
    	if($formInfo === false) return ApiResponseUtils::ERROR(400, 'Lỗi hệ thống', $code);

    	$formCates = $this->formCateModel->selectByIdFormInfo($formInfo['id']);
    	return ApiResponseUtils::SUCCESS('Thành công', $formCates);
    }
}