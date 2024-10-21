<?php
class UserView {
    public function goList($search, $users){
        include_once("template/user/list.php");
    }

    public function goAdd($role, $status){
    	include_once("template/user/add.php");
    }

    public function goUpdate($user, $role, $status){
    	include_once("template/user/update.php");
    }
}