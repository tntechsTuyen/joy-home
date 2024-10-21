<?php 
class FormInfoView{
	public function goList($search, $formGroups, $formInfos){
        include_once("template/form-info/list.php");
    }

    public function goAdd($formGroups){
    	include_once("template/form-info/add.php");
    }

    public function goUpdate($formInfo, $formGroups, $types){
    	include_once("template/form-info/update.php");
    }
}
