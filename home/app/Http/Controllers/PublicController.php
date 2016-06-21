<?php
namespace App\Http\Controllers;

/**
 *   LoginController  账号登录
 */

class PublicController extends Controller {
	
	//展示头部
	// public  function top(){
	// 	return view("public.top");
	// }
	// /**
	//  * [left 左侧]
	//  * @return [type] [description]
	//  */
	// public  function left(){
	// 	return view("public.left");
	// }
	/**中心*/
	public  function main(){
		return view("public.main");
	}

}	

?>