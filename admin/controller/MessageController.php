<?php 
include_once("view/MessageView.php");

class MessageController{
	private $messageView = null;

	public function __construct(){
		$this->messageView = new MessageView();
	}

	public function list(){
		$this->messageView->list();
	}
}
