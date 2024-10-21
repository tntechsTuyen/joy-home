<?php 

class AuthView {

	function login(){
		include_once("user/template/component/login.php");
	}

	function register(){
		include_once("user/template/component/register.php");
	}

	function forgot(){
		include_once("user/template/component/forgot.php");
	}
}