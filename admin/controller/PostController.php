<?php 
include_once("model/PostModel.php");
include_once("model/TypeModel.php");
include_once("model/StatusModel.php");
include_once("../user/model/ConfigModel.php");
include_once("view/PostView.php");

class PostController{
	private $postModel;
    private $postView;
    private $configModel;
    private $typeModel;
    private $statusModel;

    public function __construct(){
		$this->postModel = new PostModel();
        $this->postView = new PostView();
        $this->configModel = new ConfigModel();
        $this->typeModel = new TypeModel();
        $this->statusModel = new StatusModel();
	}

	public function list(){
		$code = (isset($_GET['ip-code'])) ? $_GET['ip-code'] : '';
		$key = (isset($_GET['ip-key'])) ? $_GET['ip-key'] : '';
		$name = (isset($_GET['ip-name'])) ? $_GET['ip-name'] : '';
		$type = (isset($_GET['ip-type'])) ? $_GET['ip-type'] : '';
		$status = (isset($_GET['ip-status'])) ? $_GET['ip-status'] : '';
		$page = (isset($_GET['ip-page'])) ? $_GET['ip-page'] : 1;

		$search = array(
			"code"=> $code,
			"key" => $key,
			"name"=> $name,
			"idType"=> $type,
			"idStatus"=> $status,
			"page" => $page,
			"limit" => DataUtils::DATA_PAGE_LIMIT
		);

		$configs = $this->configModel->selectLikeKey('post_');
		$types = $this->typeModel->selectByTblName('post');
		$status = $this->statusModel->selectByTblName('post');

		$list = $this->postModel->selectList($search);
		$count = $this->postModel->selectCount($search);
		$search['count'] = $count;
		$this->postView->goList($search, $configs, $types, $status, $list);
	}

	public function goAdd(){
		$configs = $this->configModel->selectLikeKey('post_');
		$types = $this->typeModel->selectByTblName('post');
		$status = $this->statusModel->selectByTblName('post');
		$this->postView->goAdd($configs, $types, $status);
	}

	public function doAdd(){
		$key = (isset($_POST['ip-key'])) ? $_POST['ip-key'] : null;
		$name = (isset($_POST['ip-name'])) ? $_POST['ip-name'] : null;
		$description = (isset($_POST['ip-description'])) ? $_POST['ip-description'] : null;
		$type = (isset($_POST['ip-type'])) ? $_POST['ip-type'] : null;
		$thumb = (isset($_POST['ip-thumb'])) ? $_POST['ip-thumb'] : null;
		$content = (isset($_POST['ip-content'])) ? $_POST['ip-content'] : null;
		$status = (isset($_POST['ip-status'])) ? $_POST['ip-status'] : null;

		$postDTO = array(
			'code' => HashUtils::UUID(),
			'key' => $key,
			'name' => $name,
			'description' => $description,
			'idType' => $type,
			'idStatus' => $status,
			'thumb' => $thumb,
			'content' => $content,
		);

		$id = $this->postModel->insert($postDTO);
		
		$_SESSION[DataUtils::SESSION_MESSAGE] = "Đăng ký thành công";
		header("Location: ?c=post&m=list");
	}

	public function goUpdate(){
		$code = (isset($_GET['code'])) ? $_GET['code'] : null;
		$post = $this->postModel->selectByCode($code);
		$configs = $this->configModel->selectLikeKey('post_');
		$types = $this->typeModel->selectByTblName('post');
		$status = $this->statusModel->selectByTblName('post');
		$this->postView->goUpdate($post, $configs, $types, $status);
	}

	public function doUpdate(){
		$code = (isset($_POST['ip-code'])) ? $_POST['ip-code'] : null;
		$key = (isset($_POST['ip-key'])) ? $_POST['ip-key'] : null;
		$name = (isset($_POST['ip-name'])) ? $_POST['ip-name'] : null;
		$description = (isset($_POST['ip-description'])) ? $_POST['ip-description'] : null;
		$type = (isset($_POST['ip-type'])) ? $_POST['ip-type'] : null;
		$thumb = (isset($_POST['ip-thumb'])) ? $_POST['ip-thumb'] : null;
		$content = (isset($_POST['ip-content'])) ? $_POST['ip-content'] : null;
		$status = (isset($_POST['ip-status'])) ? $_POST['ip-status'] : null;
		
		$post = $this->postModel->selectByCode($code);
		
		if($post === false) {
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?c=post&m=list");
		}

		$postDTO = array(
			'id' => $post['id'],
			'code' => $code,
			'key' => $key,
			'name' => $name,
			'description' => $description,
			'idType' => $type,
			'idStatus' => $status,
			'thumb' => $thumb,
			'content' => $content,
		);
		$this->postModel->update($postDTO);
		$_SESSION[DataUtils::SESSION_MESSAGE] = "Cập nhật thành công";
        header("Location: ?c=post&m=list");
	}
}