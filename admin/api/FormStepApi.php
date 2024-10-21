<?php 
include_once("model/FormStepModel.php");
include_once("model/FormCateModel.php");

class FormStepApi {
	private $formStepModel;
    private $formCateModel;

    public function __construct(){ 
    	$this->formStepModel = new FormStepModel();
        $this->formCateModel = new FormCateModel();
    }

    /**
    * Update by tree: code,id_form_cate, name
    */
    public function save(){
        $code = (isset($_POST['code'])) ? $_POST['code'] : null;
    	$idFormCate = (isset($_POST['id_form_cate'])) ? $_POST['id_form_cate'] : null;
        $name = (isset($_POST['name'])) ? $_POST['name'] : null;

    	$formStepDTO = array(
    		'idFormCate' => intval($idFormCate),
            'code' => HashUtils::UUID(),
    		'name' => $name,
            'content' => '',
            'idType' => 0,
    	);

    	if($code == null || $code == 'null'){
            //Insert cate
            $formCateReq = $this->formCateModel->selectOne($idFormCate);
            $formCateDTO = array(
                'idFormInfo' => intval($formCateReq['id_form_info']),
                'idParent' => intval($idFormCate),
                'code' => $formStepDTO['code'],
                'name' => $formStepDTO['name'],
                'type' => 'file',
                'description' => $formStepDTO['name']
            );
            $formCateDTO['id'] = $this->formCateModel->insert($formCateDTO);

            //Insert step
            $formStepDTO['id'] = $this->formStepModel->insert($formStepDTO);
    	} else {
            //Update
            $this->formCateModel->updateName($code, $name);
            $this->formStepModel->updateName($code, $name);
    	}
    	return ApiResponseUtils::SUCCESS('Thành công', $formCateDTO);
    }

    public function info(){
        $code = (isset($_GET['code'])) ? $_GET['code'] : null;

        $stepInfo = $this->formStepModel->selectByCode($code);
        if($stepInfo === false) return ApiResponseUtils::ERROR(400, 'Lỗi hệ thống', $code);
        else return ApiResponseUtils::SUCCESS('Thành công', $stepInfo);
    }
}