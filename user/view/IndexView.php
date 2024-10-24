<?php 

class IndexView {
	public function index($packs, $banners){
		include_once("user/template/component/index.php");
	}

	public function courses($packs){
		$userInfo = (isset($_SESSION[DataUtils::SESSION_LOGIN])) ? $_SESSION[DataUtils::SESSION_LOGIN] : null;
		include_once("user/template/component/courses.php");
	}

	public function about(){
		include_once("user/template/component/about.php");
	}

	public function contact(){
		include_once("user/template/component/contact.php");
	}

	public function terms(){
		include_once("user/template/component/terms.php");
	}

	public function policy(){
		include_once("user/template/component/policy.php");
	}

	public function profile($forms, $orders){
		$userInfo = (isset($_SESSION[DataUtils::SESSION_LOGIN])) ? $_SESSION[DataUtils::SESSION_LOGIN] : null;
		include_once("user/template/component/profile.php");	
	}
}