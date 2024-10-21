<?php

include_once("user/model/OrderModel.php");
include_once("user/model/PackInfoModel.php");
include_once("user/view/OrderView.php");

class OrderController {
	private $packInfoModel;
	private $orderModel;
	private $orderView;

	public function __construct() {
		$this->orderModel = new OrderModel();
		$this->orderView = new OrderView();
		$this->packInfoModel = new PackInfoModel();
	}

	public function create(){
		$code = isset($_GET['code']) ? $_GET['code'] : null;
		$userInfo = (isset($_SESSION[DataUtils::SESSION_LOGIN])) ? $_SESSION[DataUtils::SESSION_LOGIN] : null;

		if($code == null){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?m=index");
		}

		$packInfo = $this->packInfoModel->selectByCode($code);
		if($packInfo === false){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?m=index");
		}
		
		$orderInfo = $this->orderModel->selectOrderIsExists($userInfo['id'], $packInfo['id']);
		if($orderInfo === false){
			$orderDTO = array(
				'code' => HashUtils::UUID(),
				'idUser' => $userInfo['id'],
				'idPackInfo' => $packInfo['id'],
				'price' => $packInfo['price'],
				'idStatus' => 15,
				'description' => ''
			);

			$orderDTO['id'] = $this->orderModel->insert($orderDTO);
			$orderInfo = $orderDTO;
		}

		$this->orderView->create($packInfo, $orderInfo);
	}

	public function doPayment(){
		$code = isset($_GET['code']) ? $_GET['code'] : null;
		$userInfo = (isset($_SESSION[DataUtils::SESSION_LOGIN])) ? $_SESSION[DataUtils::SESSION_LOGIN] : null;

		if($code == null){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?m=index");
		}

		$packInfo = $this->packInfoModel->selectByCode($code);
		if($packInfo === false){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?m=index");
		}

		$orderInfo = $this->orderModel->selectOrderIsExists($userInfo['id'], $packInfo['id']);
		if($orderInfo === false){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?m=index");
		}
		if($orderInfo['id_status'] != 15){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Vui lòng kiểm tra lại thông tin đơn hàng";
	        header("Location: ?m=index");
		}

		$this->orderModel->updateStatus($packInfo['id'], $userInfo['id'], 16);

		$_SESSION[DataUtils::SESSION_MESSAGE] = "Hoàn thành";
        header("Location: ?m=index");
	}

	public function doCancel(){
		$code = isset($_GET['code']) ? $_GET['code'] : null;
		$userInfo = (isset($_SESSION[DataUtils::SESSION_LOGIN])) ? $_SESSION[DataUtils::SESSION_LOGIN] : null;

		if($code == null){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?m=index");
		}

		$packInfo = $this->packInfoModel->selectByCode($code);
		if($packInfo === false){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?m=index");
		}

		$orderInfo = $this->orderModel->selectOrderIsExists($userInfo['id'], $packInfo['id']);
		if($orderInfo === false){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?m=index");
		}
		if($orderInfo['id_status'] != 15){
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Vui lòng kiểm tra lại thông tin đơn hàng";
	        header("Location: ?m=index");
		}

		$this->orderModel->updateStatus($packInfo['id'], $userInfo['id'], 17);

		$_SESSION[DataUtils::SESSION_MESSAGE] = "Hủy thành công";
        header("Location: ?m=index");
	}
}
