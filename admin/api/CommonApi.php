<?php 

class CommonApi {

    public function __construct(){ }

    public function r404(){
    	return ApiResponseUtils::ERROR();
    }
}