<?php 
include_once("model/StatusModel.php");
include_once("model/OrderModel.php");
include_once("model/PackInfoModel.php");
include_once("model/PackFormModel.php");
include_once("model/UserPackFormModel.php");
include_once("model/UserPackFormStepModel.php");
include_once("view/OrderView.php");

class OrderController{
	private $orderModel;
	private $orderView;
	private $packFormModel;
	private $packInfoModel;
	private $userPackFormModel;
	private $userPackFormStepModel;

	public function __construct() {
		$this->statusModel = new StatusModel();
		$this->orderModel = new OrderModel();
		$this->orderView = new OrderView();
		$this->packInfoModel = new PackInfoModel();
		$this->packFormModel = new PackFormModel();
		$this->userPackFormModel = new UserPackFormModel();
		$this->userPackFormStepModel = new UserPackFormStepModel();
	}

	public function list(){
		$status = (isset($_GET['ip-status'])) ? $_GET['ip-status'] : '';
		$phone = (isset($_GET['ip-phone'])) ? $_GET['ip-phone'] : '';
		$pack = (isset($_GET['ip-pack'])) ? $_GET['ip-pack'] : ''; //
		$page = (isset($_GET['ip-page'])) ? $_GET['ip-page'] : 1;

		$search = array(
			"idStatus"=> $status,
			"packCode"=> $pack,
			"phone"=> $phone,
			"page" => $page,
			"limit" => DataUtils::DATA_PAGE_LIMIT
		);

		$list = $this->orderModel->selectList($search);
		$count = $this->orderModel->selectCount($search);
		$search['count'] = $count;

		#pack
		$packInfos = $this->packInfoModel->selectAll();

		#status
		$status = $this->statusModel->selectByTblName('order');

		$this->orderView->goList($search, $packInfos, $status, $list);
	}

	public function update(){
		$code = (isset($_GET['code'])) ? $_GET['code'] : '';
		$status = (isset($_GET['status'])) ? $_GET['status'] : '';

		$order = $this->orderModel->selectByCode($code);

		if($order === false) {
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?c=order&m=list");
		}

		if($order['id_status'] != 16){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Đơn hàng không hợp lệ";
	        header("Location: ?c=order&m=list");
		}

		if($status == 6){
			$this->approveOrder($order);
		}else if($status == 7){
			$this->rejectOrder($order);
		}else{
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?c=order&m=list");
		}

		$orderDTO = array(
			"code" => $code,
			"idStatus" => $status
		);

		$this->orderModel->updateStatus($orderDTO);
		$_SESSION[DataUtils::SESSION_MESSAGE] = "Phê duyệt thành công";
        header("Location: ?c=order&m=list");
	}

	public function approveOrder($order){
		$packForms = $this->packFormModel->selectFormByIdPack($order['id_pack_info']);
		foreach ($packForms as $key => $item) {
			$userPackFormDTO = array(
				'idUser' => $order['id_user'],
				'idOrder' => $order['id'],
				'idFormInfo' => $item['id_form_info'],
				'idPackInfo' => $item['id_pack_info'],
				'code' => HashUtils::UUID(),
				'process' => 0,
				'idStatus' => 9
			);
			$id = $this->userPackFormModel->insert($userPackFormDTO);
			$this->userPackFormStepModel->insertByForm($id, $item['id_form_info']);
		}

	}

	public function rejectOrder($order){
		# nothing
	}
}