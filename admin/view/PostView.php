<?php 
class PostView{
	public function goList($search, $keys, $types, $status, $posts){
        include_once("template/post/list.php");
    }

    public function goAdd($keys, $types, $status){
    	include_once("template/post/add.php");
    }

    public function goUpdate($post, $keys, $types, $status){
    	include_once("template/post/update.php");
    }
}
