<?php

class OrderView {

	public function create($packInfo, $orderInfo){
		$userInfo = (isset($_SESSION[DataUtils::SESSION_LOGIN])) ? $_SESSION[DataUtils::SESSION_LOGIN] : null;
		include_once("user/template/component/order-create.php");
	}
}