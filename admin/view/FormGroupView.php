<?php 
class FormGroupView{
	public function goList($search, $groups){
        include_once("template/form-group/list.php");
    }

    public function goAdd(){
    	include_once("template/form-group/add.php");
    }

    public function goUpdate($formGroup){
    	include_once("template/form-group/update.php");
    }
}
