<?php
include_once("user/model/PackInfoModel.php");
include_once("user/model/UserPackFormModel.php");
include_once("user/model/OrderModel.php");
include_once("user/model/PostModel.php");
include_once("user/view/IndexView.php");

class IndexController {
	private $packInfoModel;
	private $indexView;
	private $userPackFormModel;
	private $orderModel;
	private $postModel;

	public function __construct() {
		$this->packInfoModel = new PackInfoModel();
		$this->indexView = new IndexView();
		$this->userPackFormModel = new UserPackFormModel();
		$this->orderModel = new OrderModel();
		$this->postModel = new PostModel();
	}

	public function index(){
		$packInfoSearch = array(
			"code" => '',
			"page" => 1,
			"limit" => 200
		);
		$packs = $this->packInfoModel->selectList($packInfoSearch);

		$banners = $this->postModel->selectByKey(DataUtils::CONFIG_POST_BANNER);

		return $this->indexView->index($packs, $banners);
	}

	public function courses(){
		$packs = $this->packInfoModel->selectAll();
		
		return $this->indexView->courses($packs);
	}

	public function about(){
		return $this->indexView->about();
	}

	public function contact(){
		return $this->indexView->contact();
	}

	public function terms(){
		return $this->indexView->terms();
	}

	public function policy(){
		return $this->indexView->policy();
	}

	public function login(){
		return $this->indexView->login();
	}

	public function register(){
		return $this->indexView->register();
	}

	public function forgot(){
		return $this->indexView->forgot();
	}

	public function profile(){
		$userInfo = $_SESSION[DataUtils::SESSION_LOGIN];
		$forms = $this->userPackFormModel->selectFormByUser($userInfo['id']);
		$orders = $this->orderModel->selectByIdUser($userInfo['id']);
		return $this->indexView->profile($forms, $orders);
	}
}
