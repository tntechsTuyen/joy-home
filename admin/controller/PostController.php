<?php 
include_once("model/PostModel.php");
include_once("../user/model/ConfigModel.php");
include_once("view/PostView.php");

class PostController{
	private $postModel;
    private $postView;

    public function __construct(){
		$this->postModel = new PostModel();
        $this->postView = new PostView();
	}

	public function list(){
		$code = (isset($_GET['ip-code'])) ? $_GET['ip-code'] : '';
		$key = (isset($_GET['ip-key'])) ? $_GET['ip-key'] : '';
		$name = (isset($_GET['ip-name'])) ? $_GET['ip-name'] : '';
		$page = (isset($_GET['ip-page'])) ? $_GET['ip-page'] : 1;

		$search = array(
			"code"=> $code,
			"key" => $key,
			"name"=> $name,
			"page" => $page,
			"limit" => DataUtils::DATA_PAGE_LIMIT
		);

		$list = $this->postModel->selectList($search);
		$count = $this->postModel->selectCount($search);
		$search['count'] = $count;
		$this->postView->goList($search, $list);
	}

	public function goAdd(){
		$this->postView->goAdd();
	}

	public function doAdd(){
		$key = (isset($_POST['ip-key'])) ? $_POST['ip-key'] : null;
		$name = (isset($_POST['ip-name'])) ? $_POST['ip-name'] : null;
		$type = (isset($_POST['ip-type'])) ? $_POST['ip-type'] : null;
		$thumb = (isset($_POST['ip-thumb'])) ? $_POST['ip-thumb'] : null;
		$content = (isset($_POST['ip-content'])) ? $_POST['ip-content'] : null;

		$postDTO = array(
			'code' => HashUtils::UUID(),
			'key' => $key,
			'name' => $name,
			'idType' => $type,
			'thumb' => $thumb,
			'content' => $content,
		);

		$id = $this->postModel->insert($postDTO);
		
		$_SESSION[DataUtils::SESSION_MESSAGE] = "Đăng ký thành công";
		header("Location: ?c=formGroup&m=list");
	}

	public function goUpdate(){
		$code = (isset($_GET['code'])) ? $_GET['code'] : null;
		$post = $this->postModel->selectByCode($code);
		$this->postView->goUpdate($post);
	}

	public function doUpdate(){
		$code = (isset($_POST['ip-code'])) ? $_POST['ip-code'] : null;
		$key = (isset($_POST['ip-key'])) ? $_POST['ip-key'] : null;
		$name = (isset($_POST['ip-name'])) ? $_POST['ip-name'] : null;
		$type = (isset($_POST['ip-type'])) ? $_POST['ip-type'] : null;
		$thumb = (isset($_POST['ip-thumb'])) ? $_POST['ip-thumb'] : null;
		$content = (isset($_POST['ip-content'])) ? $_POST['ip-content'] : null;
		
		$post = $this->postModel->selectByCode($code);
		
		if($post === false) {
			$_SESSION[DataUtils::SESSION_MESSAGE] = "Lỗi hệ thống";
	        header("Location: ?c=formGroup&m=list");
		}

		$postDTO = array(
			'id' => $post['id'],
			'code' => $code,
			'key' => $key,
			'name' => $name,
			'idType' => $type,
			'thumb' => $thumb,
			'content' => $content,
		);
		$this->postModel->update($postDTO);
		$_SESSION[DataUtils::SESSION_MESSAGE] = "Cập nhật thành công";
        header("Location: ?c=formGroup&m=list");
	}
}