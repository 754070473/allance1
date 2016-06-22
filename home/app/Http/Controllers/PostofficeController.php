<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Request,Validator,DB;
use App\Http\Controllers\Controller;
use App\Models\Alpost;

/**
 *   PostofficeController  发布职位
 */

class PostofficeController extends Controller{

	//发布新职位
	public function create()
	{   
        $Alpost = new Alpost;

        $res = Alpost::all();
        //递归处理数据
        $arr=$Alpost->digui($res);
        print_r($arr);die;
		return view("postoffice.create",['arr'=>$arr]);
	}

	

	//职位发布成功
	public function index06()
	{
		return view("postoffice.index06");
	}

}