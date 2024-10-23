<?php 

include_once("user/model/ConfigModel.php");
include_once("user/model/ChannelModel.php");
include_once("user/model/ChannelUserModel.php");
include_once("user/model/ChannelMessageModel.php");

class ChatApi {
	private $configModel;
	private $channelModel;
	private $channelUserModel;
	private $channelMessageModel;

	function __construct() {
		$this->configModel = new ConfigModel();
		$this->channelModel = new ChannelModel();
		$this->channelUserModel = new ChannelUserModel();
		$this->channelMessageModel = new ChannelMessageModel();
	}

	public function send(){
		$userInfo = (isset($_SESSION[DataUtils::SESSION_LOGIN])) ? $_SESSION[DataUtils::SESSION_LOGIN] : null;
		$channelCode = (isset($_POST['channel'])) ? $_POST['channel'] : '';
		$message = (isset($_POST['message'])) ? $_POST['message'] : '';

		if(strlen($message) == 0) return ApiResponseUtils::ERROR(400, 'Lỗi hệ thống', $message);

		$userReceiveMessage = $this->configModel->selectOneByKey('channel_user_receive_message');
		if($userReceiveMessage === false) return ApiResponseUtils::ERROR(400, 'Lỗi hệ thống', 'channel_user_receive_message');

		#check user channel
		if(strlen($channelCode) == 0){
			#create new channel
			$channelDTO = array(
				'code' => HashUtils::UUID(),
				'name' => $userInfo['full_name'],
				'idType' => 0
			);
			$idChannel = $this->channelModel->insert($channelDTO);
			
			#create new channel user (user1, user2)
			$channelUserDTO = array(
				'idChannel' => $idChannel,
				'idUser' => $userInfo['id']
			);
			$this->channelUserModel->insert($channelUserDTO);

			$channelUserDTO['idUser'] = $userReceiveMessage['value'];
			$this->channelUserModel->insert($channelUserDTO);
		}else{
			$channelInfo = $this->channelModel->selectByCode($code);
			$idChannel = $channelInfo['id_channel'];
		}

		$messageDTO = array(
			'idChannel' => $idChannel,
			'idUser' => $userInfo['id'];
			'idParent' => 0,
			'content' => $message
		);
		$id = $this->channelMessageModel->insert($messageDTO);
		$messageDTO['id'] = $id;

		#send notify to user

		return ApiResponseUtils::SUCCESS('Thành công', $messageDTO);
	}
}