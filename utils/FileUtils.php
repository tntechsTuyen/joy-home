<?php 
class FileUtils {

	public static function UPLOAD($file){
		$year = date('Y');
		$month = date('m');
		$date = date('d');

		$subFolder = "./../uploads/$year";
		self::INIT_FOLDER($subFolder);

		$subFolder = "./../uploads/$year/$month";
		self::INIT_FOLDER($subFolder);
		
		$subFolder = "./../uploads/$year/$month/$date";
		self::INIT_FOLDER($subFolder);
		
		$subFolder = "../uploads/".$year."/".$month."/".$date."/";
	
		$fileName = $file['name'];
        $fileTmp = $file['tmp_name'];
        $size = $file['size'];
        $fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
        $hash = HashUtils::UUID();
        $url = $subFolder . $hash . "." . $fileType;
        if (move_uploaded_file($fileTmp, $url)) {
        	return array(
        		'name' => $fileName,
        		'tmp' => $fileTmp,
        		'size' => $size,
        		'hash' => $hash,
        		'url' => substr($url,3)
        	);
        }else{
        	return false;
        }
	}

	public static function INIT_FOLDER($folder){
		if(!file_exists($folder)) {
	    	mkdir($folder,0777);
	    }
	}
}