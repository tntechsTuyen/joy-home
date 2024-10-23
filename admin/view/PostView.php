<?php 
class PostView{
	public function goList($search, $posts){
        include_once("template/post/list.php");
    }

    public function goAdd(){
    	include_once("template/post/add.php");
    }

    public function goUpdate($post){
    	include_once("template/post/update.php");
    }
}
