<?php 
class PackInfoView{
	public function goList($search, $packInfos){
        include_once("template/pack-info/list.php");
    }

    public function goAdd(){
    	include_once("template/pack-info/add.php");
    }

    public function goUpdate($packInfo, $packForms, $setupForms){
    	include_once("template/pack-info/update.php");
    }
}
