<?php 
class ApiResponseUtils {
	public static function SUCCESS($message, $data){
		return json_encode(array(
			'code' => 200,
			'status' => 'SUCCESS',
			'message' => $message,
			'data' => $data 
		));
	}

	public static function ERROR($code=404, $message='Not found', $data=NULL){
		return json_encode(array(
			'code' => $code,
			'status' => 'ERROR',
			'message' => $message,
			'data' => $data
		));
	}
}