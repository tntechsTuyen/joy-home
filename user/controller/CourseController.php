<?php 

include_once("user/model/UserPackFormModel.php");
include_once("user/model/UserPackFormStepModel.php");
include_once("user/view/CourseView.php");

class CourseController {
	private $userPackFormModel;
	private $userPackFormStepModel;
	private $courseView;

	public function __construct() {
		$this->userPackFormModel = new UserPackFormModel();
		$this->userPackFormStepModel = new UserPackFormStepModel();
		$this->courseView = new CourseView();
	}

	/**
	* @param $code (user_pack_form table)
	*/
	public function learn(){
		$code = (isset($_GET['code'])) ? $_GET['code'] : null;
		$stepCode = (isset($_GET['step'])) ? $_GET['step'] : null;
		
		$userInfo = (isset($_SESSION[DataUtils::SESSION_LOGIN])) ? $_SESSION[DataUtils::SESSION_LOGIN] : null;

		if($code == null){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?m=index");
		}

		$userPackForm = $this->userPackFormModel->selectByCode($code);
		if($userPackForm === false){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?m=index");	
		}
		
		// Get steps list
		$stepRaws = $this->userPackFormStepModel->selectStepByUserPackForm($userPackForm['id']);
		if(count($stepRaws) == 0){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?m=index");	
		}

		$cates = array();
		$stepInfo = null;
		foreach ($stepRaws as $key => $item) {
			if($item["step_id"] == null){
				# is cate
				
				$cates[$item['cate_id']] = array(
					'cate_id' => $item['cate_id'],
					'cate_code' => $item['cate_code'],
					'cate_name' => $item['cate_name'],
					'fc_parent' => $item['fc_parent'],
					'cate_cote' => $item['cate_cote'],
					'upf_process' => $item['upf_process'],
					'collapse' => '',
					'steps' => array()
				);
			}else{
				# is step
				if($stepCode == $item['step_code']) {
					$cates[$item['fc_parent']]['collapse'] = 'show';	
					$stepInfo = $item;
				} 
				
				array_push($cates[$item['fc_parent']]['steps'], $item);
			}
		}
		
		$this->courseView->learn($cates, $code, $stepInfo);
	}

	public function finish(){
		$userPackFormCode = (isset($_GET['code'])) ? $_GET['code'] : null;
		$stepCode = (isset($_GET['step'])) ? $_GET['step'] : null;

		$userPackFormStep = $this->userPackFormStepModel->selectByUserPackFormAndStep($userPackFormCode, $stepCode);

		if($userPackFormStep === false){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?m=index");
		}

		$this->userPackFormStepModel->updateStatus($userPackFormStep['id'], 14);
		$cnt = $this->userPackFormStepModel->selectCountByUserPackFormGroupByStatus($userPackFormStep['id_user_pack_form']);
		$this->userPackFormModel->updateProcess($userPackFormStep['id_user_pack_form'], $cnt['t1']/$cnt['t2']);

		header("Location: ?c=courses&m=learn&code=$userPackFormCode");
	}
}