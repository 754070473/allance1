<?php
namespace App\Http\Controllers;

/**
 *   LoginController  账号登录
 */

class LoginController extends Controller {
	
	//展示登录界面
	public  function login(){
		return view("login.login");
	}

}	

?>