<?php
namespace App\Http\Controllers;
use DB;
use Session;

use Illuminate\Http\Request;
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
		$per_id=Session::get('per_id');
		$arr = $this->classify('al_post','p_pid');
		return view("public.main",["per_id"=>$per_id,'arr'=>$arr]);
	}

}	

?>