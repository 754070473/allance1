<?php
namespace App\Http\Controllers;

/**
 *   CpregisterController  企业注册
 */

class CpregisterController extends Controller{

    //填写公司信息
	public function founder()
	{
		return view("cpregister.founder");
	}

	//填写公司信息
	public function index01()
	{
		return view("cpregister.index01");
	}

	//填写公司信息
	public function index02()
	{
		return view("cpregister.index02");
	}

	//填写公司信息
	public function index03()
	{
		return view("cpregister.index03");
	}

	//填写公司信息  发布职位
	public function success()
	{
		return view("cpregister.success");
	}

	//填写公司信息 
	public function tag()
	{
		return view("cpregister.tag");
	}
}