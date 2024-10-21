<?php 
include_once("model/MediaModel.php");

class MediaApi {

	private $mediaModel;

    public function __construct(){ 
    	$this->mediaModel = new MediaModel();
    }

    public function upload(){
    	$file = (isset($_FILES['file'])) ? $_FILES['file'] : null;
    	if($file == null) return ApiResponseUtils::ERROR(400, 'Lỗi hệ thống', null);

    	$fileData = FileUtils::UPLOAD($file);
    	$mediaDTO = array(
    		'idUser' => 0,
    		'idType' => 0,
    		'code' => $fileData['hash'],
    		'name' => $fileData['name'],
    		'tmpName' =>  $fileData['tmp'],
    		'size' => $fileData['size'],
    		'path' => $fileData['url']
    	);

    	$mediaDTO['id'] = $this->mediaModel->insert($mediaDTO);
    	return ApiResponseUtils::SUCCESS('Thành công', $mediaDTO);
    }
}