<?php
namespace App\Http\Controllers;
use DB;

/**
 *   RegisterController  用户注册
 */

class RegisterController extends Controller{

    //注册
	public  function register(){
			
		return view("register.register");
	}
}